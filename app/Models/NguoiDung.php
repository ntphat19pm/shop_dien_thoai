<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
class NguoiDung extends Authenticatable
{
 use HasFactory, Notifiable;
 
 protected $table = 'nguoidung';
 
 protected $fillable = [
 'name', 'username', 'email', 'password', 'role',
 ];
 
 protected $hidden = [
 'password', 'remember_token',
 ];
 
 protected $casts = [
 'email_verified_at' => 'datetime',
 ];
 
 public function DonHang()
 {
 return $this->hasMany('App\Models\DonHang', 'nguoidung_id', 'id');
 }
 
 public function sendPasswordResetNotification($token)
 {
 $this->notify(new CustomResetPasswordNotification($token));
 } }
class CustomResetPasswordNotification extends ResetPassword
{
 public function toMail($notifiable)
 {
 return (new MailMessage)
 ->subject('Khôi phục mật khẩu')
 ->line('Bạn vừa yêu cầu ' . config('app.name') . ' khôi phục mật khẩu của mình.')
 ->line('Xin vui lòng nhấn vào nút "Khôi phục mật khẩu" bên dưới để tiến hành cấp mật khẩu mới.')
 ->action('Khôi phục mật khẩu', url(config('app.url') . route('password.reset', $this->token, false)))
 ->line('Nếu bạn không yêu cầu đặt lại mật khẩu, xin vui lòng không làm gì thêm và báo lại cho quản trị 
hệ thống về vấn đề này.');
 } }