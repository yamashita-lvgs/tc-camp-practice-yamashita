<?php
namespace App\Console\Commands;

use App\Services\LoginHistoryService;
use Illuminate\Console\Command;

/**
 * ユーザーログイン履歴削除に関するコマンドクラス
 * @package App\Console\Commands
 */
class DeleteUserLoginHistory extends Command
{
    protected $signature = 'delete_user_loginh_history';

    protected $description = 'physical delete days exceeded login history';

    public function handle()
    {
        LoginHistoryService::physicalDeleteDaysExceededLoginHistory();
    }
}
