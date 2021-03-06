<?php

namespace App\Console\Commands\Tenant;

use App\Tenant\Database\TenantDatabaseManager;
use App\Tenant\Traits\Console\AcceptsMultipleTenants;
use App\Tenant\Traits\Console\FetchesTenant;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Database\Migrations\Migrator;

class MigrateRefresh extends RefreshCommand
{
    use FetchesTenant, AcceptsMultipleTenants;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset and re-run all migrations for tenants';

    /**
     * Instance of tenant's Database Manager.
     *
     * @var TenantDatabaseManager
     */
    protected $db;

    /**
     * Create a new command instance.
     *
     * @param Migrator $migrator
     * @param TenantDatabaseManager $db
     */
    public function __construct(Migrator $migrator, TenantDatabaseManager $db)
    {
        parent::__construct($migrator);
        $this->setName('tenants:rollback');

        $this->specifyParameters();

        $this->db = $db;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->confirmToProceed()) {
            return;
        }

        // set the migration database to tenant's
        $this->input->setOption('database', 'tenant');

        // get tenants
        $ids = $this->option('tenants');

        // loop through tenants and run their migrations
        $this->tenants($ids)->each(function ($tenant) {

            // create tenant db connection
            $this->db->createConnection($tenant);

            // connect to the tenant
            $this->db->connectToTenant();

            parent::handle();

            // purge tenant's connection
            $this->db->purge();
        });
    }

    /**
     * Get all of the migration paths.
     *
     * @return array
     */
    protected function getMigrationPaths()
    {
        return [
            database_path('migrations/tenant')
        ];
    }
}
