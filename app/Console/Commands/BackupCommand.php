<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'backup:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menjalankan Backup Sql Dan Storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mysqlBackupPath = storage_path('backups/sql');
        $mysqlBackupFileName = 'backup_' . now()->format('Ymd_His') . '.sql';

        $mysqlDumpCommand = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            $mysqlBackupPath . '/' . $mysqlBackupFileName
        );

        shell_exec($mysqlDumpCommand);

        $zipBackupPath = storage_path('backups/zip');
        $zipBackupFileName = 'backup_' . now()->format('Ymd_His') . '.zip';

        $foldersToBackup = [
            'storage/app',
        ];

        $zipCommand = sprintf(
            'zip -r %s %s',
            $zipBackupPath . '/' . $zipBackupFileName,
            implode(' ', $foldersToBackup)
        );

        shell_exec($zipCommand);

        $this->info('Backup completed successfully.');
    }
}
