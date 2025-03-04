<?php

App::uses('Component', 'Controller');

class RestSearchComponent extends Component
{
    //This array determines the order for ordered_url_params, as a result it is not advised to remove or change existing values
    public $paramArray = array(
        'Attribute' => [
            'returnFormat',
            'value',
            'value1',
            'value2',
            'type',
            'category',
            'org',
            'tags',
            'from',
            'to',
            'last',
            'eventid',
            'withAttachments',
            'uuid',
            'publish_timestamp',
            'published',
            'timestamp',
            'enforceWarninglist',
            'to_ids',
            'deleted',
            'includeEventUuid',
            'event_timestamp',
            'threat_level_id',
            'includeEventTags',
            'includeProposals',
            'limit',
            'page',
            'requested_attributes',
            'includeContext',
            'headerless',
            'includeWarninglistHits',
            'attackGalaxy',
            'object_relation',
            'includeSightings',
            'includeCorrelations',
            'includeDecayScore',
            'decayingModel',
            'excludeDecayed',
            'modelOverrides',
            'includeFullModel',
            'score',
            'attribute_timestamp',
            'first_seen',
            'last_seen',
            'eventinfo',
            'sharinggroup',
            'allow_proposal_blocking',
            'flatten',
            'list',
            'event_ids',
            'includeAllTags',
            'includeAttributeUuid',
            'includeGalaxy'
        ],
        'Event' => [
            'returnFormat',
            'value',
            'type',
            'category',
            'org',
            'tags',
            'searchall',
            'from',
            'to',
            'last',
            'eventid',
            'withAttachments',
            'metadata',
            'uuid',
            'publish_timestamp',
            'timestamp',
            'event_timestamp', // redundant, but kept for backwards compatibility
            'published',
            'enforceWarninglist',
            'sgReferenceOnly',
            'limit',
            'page',
            'requested_attributes',
            'includeContext',
            'headerless',
            'includeWarninglistHits',
            'attackGalaxy',
            'to_ids',
            'deleted',
            'excludeLocalTags',
            'date',
            'includeSightingdb',
            'tag',
            'object_relation',
            'threat_level_id',
            'eventinfo',
            'sharinggroup',
            'idList',
            'includeAllTags',
            'includeAttachments',
            'event_uuid',
            'distribution',
            'sharing_group_id',
            'disableSiteAdmin',
            'flatten',
            'blockedAttributeTags',
            'eventsExtendingUuid',
            'extended',
            'extensionList',
            'excludeGalaxy',
            'includeRelatedTags',
            'includeDecayScore',
            'includeScoresOnEvent',
            'includeFeedCorrelations',
            'includeServerCorrelations',
            'noEventReports',
            'noShadowAttributes',
            'order',
            'protected',
            'includeGranularCorrelations'
        ],
        'Object' => [
            'returnFormat',
            'value',
            'type',
            'category',
            'org',
            'tags',
            'from',
            'to',
            'last',
            'eventid',
            'withAttachments',
            'uuid',
            'publish_timestamp',
            'published',
            'timestamp',
            'enforceWarninglist',
            'to_ids',
            'deleted',
            'includeEventUuid',
            'event_timestamp',
            'threat_level_id',
            'includeEventTags',
            'includeProposals',
            'limit',
            'page',
            'requested_attributes',
            'includeContext',
            'headerless',
            'includeWarninglistHits',
            'attackGalaxy',
            'object_relation',
            'metadata',
            'includeAllTags'
        ],
        'Sighting' => [
            'context',
            'returnFormat',
            'id',
            'type',
            'from',
            'to',
            'last',
            'org_id',
            'source',
            'includeAttribute',
            'includeEvent'
        ],
        'GalaxyCluster' => [
            'page',
            'limit',
            'id',
            'uuid',
            'galaxy_id',
            'galaxy_uuid',
            'version',
            'distribution',
            'org',
            'orgc',
            'tag',
            'custom',
            'sgReferenceOnly',
            'minimal',
            'list',
            'first',
            'count'
        ],
    );

    public function getFilename($filters, $scope, $responseType)
    {
        $filename = false;
        if ($scope === 'Event') {
            $filename = 'misp.event.';
            if (!empty($filters['eventid']) && !is_array($filters['eventid'])) {
                if (Validation::uuid(trim($filters['eventid']))) {
                    $filename .= trim($filters['eventid']);
                } else if (!empty(intval(trim($filters['eventid'])))) {
                    $filename .= intval(trim($filters['eventid']));
                }
            } else {
                $filename .= 'list';
            }
        }
        if ($filename !== false) {
            $filename .= '.' . $responseType;
        }
        return $filename;
    }
}
