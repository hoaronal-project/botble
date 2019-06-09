<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/8/2019
 * Time: 11:49 PM
 */

namespace Botble\Member\Http\Controllers;


use Botble\Base\Http\Controllers\BaseController;
use Botble\Member\Repositories\Interfaces\SocialInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends BaseController
{
    protected $social;
    public function __construct(SocialInterface $social)
    {
        $this->social = $social;
    }
    protected function guard()
    {
        return Auth::guard('member');
    }

    /**
     * Call to login facebook with socialite function
     * @return Socialite
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * facebook callback function
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function facebookCallback()
    {
        $oAuth = Socialite::driver('facebook')->user();
        try {
            if ($oAuth) :
                $member = $this->social->getOrCreateMember($oAuth);
                auth()->guard("member")->logout();
                auth()->guard('member')->login($member);
                if (auth()->guard("member")->check()) {
                    return redirect()->route('public.index')->with([
                        'error' => false,
                        'message' => 'Đăng nhập thành công'
                    ]);
                }else{
                    return redirect()->route('public.index')->with([
                        'error' => true,
                        'message' => 'Đăng nhập thất bại',
                    ]);
                }
            else:
                return redirect()->route('public.index')->with([
                    'error' => true,
                    'message' => 'Lỗi kết nối đến app facebook! Vui lòng thử lại sau',
                ]);
                endif;
        } catch (\Throwable $throwable) {
            dd($throwable->getMessage());
            DB::rollBack();
            return redirect()->route('public.index')->with([
                'error' => true,
                'message' => 'unknown error',
                'dm' => $throwable->getMessage()
            ]);
        }
    }
}
