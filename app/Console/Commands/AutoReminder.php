<?php
namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\sendmail;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoReminder extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'auto:reminder';
   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Remind Clients to send their profile pictures';
   /**
    * Create a new command instance.
    *
    * @return void
    */
   public function __construct()
   {
       parent::__construct();
   }
   /**
    * Execute the console command.
    *
    * @return mixed
    */
   public function handle()
   {
       $tr = User::all();
       $tod = strtotime(date('Y-m-d'));
       
       foreach($tr as $val) {
            $next = strtotime(date('Y-m-d', strtotime($val->created_at)));
            $diff = ceil(($tod - $next)/(60*60*24));
            $dof = $diff%3;
            if($val->image == 'images/clients/avatar.png') {
            if($next > $tod && $dof == 0) {
                
                $subject = 'Reminder from LawPavilion';
                $msg = 'Hello '.$val->first_name .', This is to remind you to send your profile picture for proper documentation. Thanks';
                Mail::to($val->email)->send(new sendmail($msg, $subject));
            
            }
            }
           
       }
   }
}