<?php
namespace App\Console\Commands;

use App\Services\LoginHistoryService;
use Illuminate\Console\Command;

/**
 * ログイン履歴削除に関するコマンドクラス
 * @package App\Console\Commands
 */
class DeleteLoginHistoryCommand extends Command
{
    protected $signature = 'delete_login_history';

    protected $description = 'Physically delete the user login history exceeding a certain period.';

    public function handle()
    {
        LoginHistoryService::physicalDeletePeriodExceededLogs();
    }
}
