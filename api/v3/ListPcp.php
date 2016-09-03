<?php

/**
 * ListPcp.get API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_list_pcp_get($params) {
    return _civicrm_api3_basic_get('CRM_PCP_BAO_PCP', $params, TRUE);
}


function _civicrm_api3_list_pcp_getcontributionscount_spec(&$params) {
    $params['pcp_id']['api.required'] = 1;
}

function civicrm_api3_list_pcp_getcontributionscount($params) {
    $cs_get_params = array(
        'pcp_id' => $params['pcp_id'],
        'sequential' => 1
    );
    $result = civicrm_api3('ContributionSoft', 'get', $cs_get_params);
    $total_contribution = 0;
    if(!empty($result['values'])) {
        $total_contribution =count($result['values']);
    }
    return array('is_error' => 0, 'result' => $total_contribution);
}

function _civicrm_api3_list_pcp_getamountraised_spec(&$params) {
    $params['pcp_id']['api.required'] = 1;
}


/**
 * ListPcp.getRaisedAmount API
 *
 * @param array $params
 * @return int The total raised amount through the given PCP
 */
function civicrm_api3_list_pcp_getamountraised($params) {
    $cs_get_params = array(
        'pcp_id' => $params['pcp_id'],
        'sequential' => 1
    );
    $result = civicrm_api3('ContributionSoft', 'get', $cs_get_params);
    $raised_amount = 0.00;
    if(!empty($result['values'])) {
        foreach($result['values'] as $contribution_soft) {
            if(is_numeric($contribution_soft['amount'])) {
                $raised_amount += $contribution_soft['amount'];
            }
        }
    }
    return array('is_error' => 0, 'result' => CRM_Utils_Money::format($raised_amount, null, null, true));
}
?>