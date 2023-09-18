<?php
// This file is part of PowerEduc - http://powereduc.org/
//
// PowerEduc is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// PowerEduc is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with PowerEduc.  If not, see <http://www.gnu.org/licenses/>.

namespace enrol_lti\local\ltiadvantage\lib;
use enrol_lti\local\ltiadvantage\repository\application_registration_repository;
use enrol_lti\local\ltiadvantage\repository\deployment_repository;
use Packback\Lti1p3\Interfaces\IDatabase;
use Packback\Lti1p3\LtiDeployment;
use Packback\Lti1p3\LtiRegistration;

/**
 * The issuer_database class, providing a read-only store of issuer details.
 *
 * @package    enrol_lti
 * @copyright  2021 Jake Dallimore <jrhdallimore@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class issuer_database implements IDatabase {

    /** @var application_registration_repository an application registration repository instance used for lookups.*/
    private $appregrepo;

    /** @var deployment_repository a deployment repository instance for lookups.*/
    private $deploymentrepo;

    /**
     * The issuer_database constructor.
     * @param application_registration_repository $appregrepo an application registration repository instance.
     * @param deployment_repository $deploymentrepo a deployment repository instance.
     */
    public function __construct(application_registration_repository $appregrepo,
            deployment_repository $deploymentrepo) {

        $this->appregrepo = $appregrepo;
        $this->deploymentrepo = $deploymentrepo;
    }

    /**
     * Find and return an LTI registration based on its unique {issuer, client_id} tuple.
     *
     * @param string $iss the issuer id.
     * @param string $clientId the client_id of the registration.
     * @return LtiRegistration|null The registration object, or null if not found.
     */
    public function findRegistrationByIssuer($iss, $clientId = null): ?LtiRegistration {
        if (is_null($clientId)) {
            throw new \coding_exception("The param 'clientid' is required. Calling code must either pass in 'client_id' ".
                "(generated by the platform during registration) or 'id' (found in the initiate login URI created by the tool) ".
                "to identify the client.");
        }

        global $CFG;
        require_once($CFG->libdir . '/powereduclib.php'); // For get_config() usage.

        // We can identify registrations two ways. Either:
        // 1. Using issuer + the platform-generated clientid. Most platforms will have sent client_id in the initiate login request
        // despite it being an optional param in the spec. They must include it as the aud value in the resource link request JWT.
        // 2. Using issuer + a tool-generated ID. This supports platforms which omit client_id during a login call. Using the ID
        // that is a part of the initiate login URI allows PowerEduc to locate the registration for that unique client, without the
        // platform-generated client_id.
        // Major platforms will likely include client_id in the login request, so favor that approach first, only falling back on
        // the local id approach where a registration cannot be found in the first instance.
        $reg = $this->appregrepo->find_by_platform($iss, $clientId);
        if (!$reg) {
            $reg = $this->appregrepo->find_by_platform_uniqueid($iss, $clientId);
        }
        if (!$reg) {
            return null;
        }
        $privatekey = get_config('enrol_lti', 'lti_13_privatekey');
        $kid = get_config('enrol_lti', 'lti_13_kid');

        return LtiRegistration::new()
            ->setAuthLoginUrl($reg->get_authenticationrequesturl()->out(false))
            ->setAuthTokenUrl($reg->get_accesstokenurl()->out(false))
            ->setClientId($reg->get_clientid())
            ->setKeySetUrl($reg->get_jwksurl()->out(false))
            ->setKid($kid)
            ->setIssuer($reg->get_platformid()->out(false))
            ->setToolPrivateKey($privatekey);
    }

    /**
     * Returns an LTI deployment based on the {issuer, client_id} tuple and a deployment id string.
     *
     * @param string $iss the issuer id.
     * @param string $deploymentId the deployment id.
     * @param string $clientId the client_id of the registration.
     * @return LtiDeployment|null The deployment object or null if not found.
     */
    public function findDeployment($iss, $deploymentId, $clientId = null): ?LtiDeployment {
        if (is_null($clientId)) {
            throw new \coding_exception("Both issuer and client id are required to identify platform registrations ".
                "and must be included in the 'aud' claim of the message JWT.");
        }

        $appregistration = $this->appregrepo->find_by_platform($iss, $clientId);
        if (!$appregistration) {
            return null;
        }
        $deployment = $this->deploymentrepo->find_by_registration($appregistration->get_id(), $deploymentId);
        if (!$deployment) {
            return null;
        }
        return LtiDeployment::new()
            ->setDeploymentId($deployment->get_deploymentid());
    }
}
