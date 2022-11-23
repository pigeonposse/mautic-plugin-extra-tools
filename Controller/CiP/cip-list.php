<?php

/**
 * ***********************************************************************
 * Allowed MAUTIC CMDS
 * ***********************************************************************
 **/
function pigeon_allowed_mautic_cmds() {

	return [
		// cache
		"cache-clear" => [
			"name" 	=> "Clear cache",
			"desc" 	=> "",
			"cmd" 	=> 'cache:clear',
		],
		"cache-clear-no" => [
			"name" 	=> "Clear cache with flags",
			"desc" 	=> "",
			"cmd" 	=> 'cache:clear --no-interaction --no-warmup --no-optional-warmers',
		],
		"cache-warmup" => [
			"name" 	=> "Warmup cache",
			"desc" 	=> "",
			"cmd" 	=> 'cache:warmup --no-interaction --no-optional-warmers',
		],

		// Debug
		"debug-swiftmailer" => [
			"name" 	=> "Debug swiftmailer",
			"desc" 	=> "",
			"cmd" 	=> 'debug:swiftmailer',
		],
		"debug-router" => [
			"name" 	=> "Debug router",
			"desc" 	=> "",
			"cmd" 	=> 'debug:router',
		],
		"debug-event-dispatcher" => [
			"name" 	=> "Debug event dispatcher",
			"desc" 	=> "",
			"cmd" 	=> 'debug:event-dispatcher',
		],

		// segments
		"seg-update" => [
			"name" 	=> "Update segments",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:segments:update',
		],
		"seg-update-f" => [
			"name" 	=> "Update segments (force)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:segments:update --force',
		],
		"seg-update-m" => [
			"name" 	=> "Update segments (max 300)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:segments:update --max-contacts=300 --batch-limit=300',
		],
		"seg-update-mq" => [
			"name" 	=> "Update segments (max 300 & quiet)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:segments:update --max-contacts=300 --batch-limit=300 --quiet',
		],
		"seg-update-mf" => [
			"name" 	=> "Update segments (max 300 & force)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:segments:update --max-contacts=300 --batch-limit=300 --force',
		],
		"seg-update-mm" => [
			"name" 	=> "Update segments (max 1000)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:segments:update --max-contacts=1000 --batch-limit=300',
		],
		"seg-update-mmq" => [
			"name" 	=> "Update segments (max 1000 & quiet)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:segments:update --max-contacts=1000 --batch-limit=300 --quiet',
		],

		// campaigns
		"camp-update" => [
			"name" 	=> "Update campaigns",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:update',
		],
		"camp-update-f" => [
			"name" 	=> "Update campaigns (force)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:update --force',
		],
		"camp-update-m-100" => [
			"name" 	=> "Update campaigns (max 100 & quiet)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:update --max-contacts=100 --quiet',
		],
		"camp-update-m-300" => [
			"name" 	=> "Update campaigns (max 100 & quiet)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:update --max-contacts=300 --quiet',
		],
		"camp-trigger" => [
			"name" 	=> "Trigger campaigns",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:trigger',
		],
		"camp-trigger-f" => [
			"name" 	=> "Trigger campaigns (force)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:trigger --force',
		],
		"camp-trigger-q" => [
			"name" 	=> "Trigger campaigns (quiet)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:trigger --quiet',
		],
		"camp-msg" => [
			"name" 	=> "Message campaigns",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:messages',
		],
		"camp-msg-ce" => [
			"name" 	=> "Message campaigns (emails)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:messages --channel=email',
		],
		"camp-msg-cs" => [
			"name" 	=> "Message campaigns (SMS)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaigns:messages --channel=sms',
		],

		// campaign
		"camp-sum" => [
			"name" 	=> "Summarize campaign",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:campaign:summarize',
		],

		// emails
		"broadcasts-send" => [
			"name" 	=> "Send broadcasts",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:broadcasts:send',
		],
		"broadcasts-send-q" => [
			"name" 	=> "Send broadcasts",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:broadcasts:send --quiet',
		],
		"broadcasts-send-ce" => [
			"name" 	=> "Send broadcasts (emails)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:broadcasts:send --channel=email',
		],
		"broadcasts-send-ce" => [
			"name" 	=> "Send broadcasts (SMS)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:broadcasts:send --channel=sms',
		],

		// emails
		"emails-send" => [
			"name" 	=> "Send emails",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:emails:send',
		],
		"emails-fetch" => [
			"name" 	=> "Fetch emails",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:emails:fetch',
		],
		"emails-send-q" => [
			"name" 	=> "Send emails quiet",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:emails:send --quiet',
		],
		"emails-fetch-q" => [
			"name" 	=> "Fetch emails quiet",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:emails:fetch --quiet',
		],

		// Maintenance
		"maintenance-cleanup-90" => [
			"name" 	=> "Maintenance cleanup (90)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:maintenance:cleanup --no-interaction --days-old=90',
		],
		"maintenance-cleanup-365" => [
			"name" 	=> "Maintenance cleanup (365)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:maintenance:cleanup --no-interaction --days-old=365',
		],
		"maintenance-cleanup-90-d" => [
			"name" 	=> "Maintenance cleanup (90 & dry)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:maintenance:cleanup --no-interaction --days-old=90 --dry-run',
		],
		"maintenance-cleanup-365-d" => [
			"name" 	=> "Maintenance cleanup (365 & dry)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:maintenance:cleanup --no-interaction --days-old=365 --dry-run',
		],

		// Update
		"update-find" => [
			"name" 	=> "Find updates",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:update:find',
		],
		"update-apply" => [
			"name" 	=> "Update",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:update:apply --no-interaction --force',
		],

		// integration
		"integration-pushleadactivity" => [
			"name" 	=> "Integration - pushleadactivity",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:integration:pushleadactivity --integration=XXX',
		],
		"integration-fetchleads" => [
			"name" 	=> "Integration - fetchleads",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:integration:fetchleads --integration=XXX',
		],

		// Import
		"import" => [
			"name" 	=> "Import",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:import --limit=600',
		],
		"import-q" => [
			"name" 	=> "Import (quiet)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:import --limit=600 --quiet',
		],

		// dnc
		"import-dnc" => [
			"name" 	=> "Import dnc",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:dnc:import --limit=600',
		],
		"import-dnc-q" => [
			"name" 	=> "Import dnc (quiet)",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:dnc:import --limit=600 --quiet',
		],

		// OTHERS
		"queue-process" => [
			"name" 	=> "Queue process",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:queue:process',
		],
		"webhooks-process" => [
			"name" 	=> "Webhooks process",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:webhooks:process',
		],
		"reports-scheduler" => [
			"name" 	=> "Reports scheduler",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:reports:scheduler',
		],
		"plugins-update" => [
			"name" 	=> "Update plugins",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:plugins:update',
		],
		"iplookup-download" => [
			"name" 	=> "Download iplookup",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:iplookup:download',
		],
		"assets-generate" => [
			"name" 	=> "Generate assets",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:assets:generate',
		],
		"install-data" => [
			"name" 	=> "Install data",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:install:data --no-interaction --force',
		],
		"contacts-deduplicate" => [
			"name" 	=> "deduplicate contacts",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:contacts:deduplicate',
		],
		"unusedip-delete" => [
			"name" 	=> "Delete unusedip",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:unusedip:delete',
		],
		"dash-warn" => [
			"name" 	=> "Dashboard warning",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:dashboard:warm',
		],
		"messages-send" => [
			"name" 	=> "Send messages",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:messages:send',
		],
		"social-monitoring" => [
			"name" 	=> "",
			"desc" 	=> "",
			"cmd" 	=> 'mautic:social:monitoring',
		],

		// DOCTRINE
		"doctrine-migrations-status" => [
			"name" 	=> "Doctrine status",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:migrations:status',
		],
		"doctrine-migrations-status-v" => [
			"name" 	=> "Doctrine status (version)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:migrations:status --show-versions',
		],

		"doctrine-migrations-migrate-d" => [
			"name" 	=> "Doctrine migrate (dry)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:migrations:migrate --allow-no-migration --dry-run',
		],
		"doctrine-migrations-migrate-n" => [
			"name" 	=> "Doctrine migrate (no interation)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:migrations:migrate --allow-no-migration  --no-interaction',
		],
		"doctrine-migrations-migrate-qd" => [
			"name" 	=> "Doctrine migrate (query & dry)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:migrations:migrate --allow-no-migration --query-time --dry-run',
		],
		"doctrine-migrations-migrate-qn" => [
			"name" 	=> "Doctrine migrate (query & no interaction)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:migrations:migrate --allow-no-migration --query-time --no-interaction',
		],

		"doctrine-schema-update" => [
			"name" 	=> "Update Doctrine schema",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:schema:update',
		],
		"doctrine-schema-update-f" => [
			"name" 	=> "Update Doctrine schema (force)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:schema:update --no-interaction --force',
		],
		"doctrine-schema-update-fd" => [
			"name" 	=> "Update Doctrine schema (dump sql & force)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:schema:update --no-interaction --dump-sql --force',
		],
		"doctrine-schema-update-d" => [
			"name" 	=> "Update Doctrine schema (dump sql)",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:schema:update --dump-sql',
		],
		"doctrine-schema-validate" => [
			"name" 	=> "Validate Doctrine schema",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:schema:validate',
		],

		"doctrine-mapping-info" => [
			"name" 	=> "Mapping Doctrine info",
			"desc" 	=> "",
			"cmd" 	=> 'doctrine:mapping:info',
		],

	];

}

