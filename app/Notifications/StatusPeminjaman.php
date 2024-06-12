<?php

namespace App\Notifications;

use Crypt;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StatusPeminjaman extends Notification
{
    use Queueable;

    protected $dt;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->dt = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->dt->verifikasi == '1'){
            if($this->dt->level == 'umum'){
                return (new MailMessage)
                    ->greeting('Halo '.$this->dt->nama_organisasi.'!') 
                    ->line('Peminjaman '.$this->dt->tipe.' anda untuk dipinjam pada tanggal '.date('d-m-Y', strtotime($this->dt->rencana_pinjam)).' - '.date('d-m-Y', strtotime($this->dt->rencana_kembali)).' sudah berstatus :')
                    ->line('DISETUJUI')
                    ->line('oleh admin, silahkan konfirmasi admin ketika melakukan pengambilan alat yang dimaksud')
                    ->action('Lihat Detail', route('guest.peminjam.show', Crypt::encryptString($this->dt->id)))
                    ->from('noreply@poltekindonusa.ac.id', 'Admin :: Sarpras Polinus');
            }else{
                return (new MailMessage)
                    ->greeting('Halo '.$this->dt->getKaryawan->nama_karyawan.'!') 
                    ->line('Peminjaman '.$this->dt->tipe.' anda untuk dipinjam pada tanggal '.date('d-m-Y', strtotime($this->dt->rencana_pinjam)).' - '.date('d-m-Y', strtotime($this->dt->rencana_kembali)).' sudah berstatus :')
                    ->line('DISETUJUI')
                    ->line('oleh admin, silahkan konfirmasi admin ketika melakukan pengambilan alat yang dimaksud')
                    ->action('Lihat Detail', route('guest.peminjam.show', Crypt::encryptString($this->dt->id)))
                    ->from('noreply@poltekindonusa.ac.id', 'Admin :: Sarpras Polinus');
            }
        }else if($this->dt->verifikasi == '0'){
            if($this->dt->level == 'umum'){
                return (new MailMessage)
                    ->greeting('Halo '.$this->dt->nama_organisasi.'!') 
                    ->line('Peminjaman '.$this->dt->tipe.' anda untuk dipinjam pada tanggal '.date('d-m-Y', strtotime($this->dt->rencana_pinjam)).' - '.date('d-m-Y', strtotime($this->dt->rencana_kembali)).' sudah dimasukkan ke antrian verifikasi dengan status saat ini :')
                    ->line('MENUNGGU')
                    ->line(' verifikasi oleh admin')
                    ->action('Lihat Detail', route('guest.peminjam.show', Crypt::encryptString($this->dt->id)))
                    ->from('noreply@poltekindonusa.ac.id', 'Admin :: Sarpras Polinus');
            }else{
                return (new MailMessage)
                    ->greeting('Halo '.$this->dt->getKaryawan->nama_karyawan.'!') 
                    ->line('Peminjaman '.$this->dt->tipe.' anda untuk dipinjam pada tanggal '.date('d-m-Y', strtotime($this->dt->rencana_pinjam)).' - '.date('d-m-Y', strtotime($this->dt->rencana_kembali)).' sudah dimasukkan ke antrian verifikasi dengan status saat ini :')
                    ->line('MENUNGGU')
                    ->line(' verifikasi oleh admin')
                    ->action('Lihat Detail', route('guest.peminjam.show', Crypt::encryptString($this->dt->id)))
                    ->from('noreply@poltekindonusa.ac.id', 'Admin :: Sarpras Polinus');
            }
        }else{
            if($this->dt->level == 'umum'){
                return (new MailMessage)
                    ->greeting('Halo '.$this->dt->nama_organisasi.'!') 
                    ->line('Mohon Maaf, Untuk Peminjaman '.$this->dt->tipe.' anda yang akan dipinjam pada tanggal '.date('d-m-Y', strtotime($this->dt->rencana_pinjam)).' - '.date('d-m-Y', strtotime($this->dt->rencana_kembali)).' berstatus :')
                    ->line('DITOLAK')
                    ->line(' Oleh admin karena terdapat beberapa pertimbangan, anda mungkin bisa mengajukan peminjaman yang lain atau sama dengan hari yang berbeda atau anda dapat menghubungi admin untuk informasi penolakan lebih lanjut')
                    ->action('Lihat Detail', route('guest.peminjam.show', Crypt::encryptString($this->dt->id)))
                    ->from('noreply@poltekindonusa.ac.id', 'Admin :: Sarpras Polinus');
            }else{
                return (new MailMessage)
                    ->greeting('Halo '.$this->dt->getKaryawan->nama_karyawan.'!') 
                    ->line('Mohon maaf, untuk peminjaman '.$this->dt->tipe.' anda yang akan dipinjam pada tanggal '.date('d-m-Y', strtotime($this->dt->rencana_pinjam)).' - '.date('d-m-Y', strtotime($this->dt->rencana_kembali)).' tidak dapat diproses lebih lanjut dan berstatus :')
                    ->line('DITOLAK')
                    ->line(' anda dapat menghubungi admin untuk detail informasi penolakannya')
                    ->action('Login Sistem', route('login'))
                    ->from('noreply@poltekindonusa.ac.id', 'Admin :: Sarpras Polinus');
            }
        }

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
