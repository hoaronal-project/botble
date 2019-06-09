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
use Jorenvh\Share\Share;
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
        $drive = 'facebook';
        $oAuth = Socialite::driver($drive)->user();
        try {
            if ($oAuth) :
                $member = $this->social->getOrCreateMember($oAuth,$drive);
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
            DB::rollBack();
            return redirect()->route('public.index')->with([
                'error' => true,
                'message' => 'unknown error',
                'dm' => $throwable->getMessage()
            ]);
        }
    }

    /**
     * Call to redirect function google
     * @return \Redirect
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * The callback function of google
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function googleCallback()
    {
        $drive = 'google';
        $oAuth = Socialite::driver($drive)->user();
        try {
            if ($oAuth) :
                $member = $this->social->getOrCreateMember($oAuth,$drive);
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
                    'message' => 'Lỗi kết nối đến app google! Vui lòng thử lại sau',
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


    /**
     * Call to redirect function github
     * @return \Redirect
     */
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * The callback function of github
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function githubCallback()
    {
        $drive = 'github';
        $oAuth = Socialite::driver($drive)->user();
        try {
            if ($oAuth) :
                $member = $this->social->getOrCreateMember($oAuth, $drive);
                auth()->guard("member")->logout();
                auth()->guard('member')->login($member);
                if (auth()->guard("member")->check()) {
                    return redirect()->route('public.index')->with([
                        'error' => false,
                        'message' => 'Đăng nhập thành công'
                    ]);
                } else {
                    return redirect()->route('public.index')->with([
                        'error' => true,
                        'message' => 'Đăng nhập thất bại',
                    ]);
                }
            else:
                return redirect()->route('public.index')->with([
                    'error' => true,
                    'message' => 'Lỗi kết nối đến app github! Vui lòng thử lại sau',
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

    /**
     * Call to redirect function github
     * @return \Redirect
     */
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * The callback function of github
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function linkedinCallback()
    {
        $drive = 'linkedin';
        $oAuth = Socialite::driver($drive)->user();
        try {
            if ($oAuth) :
                $member = $this->social->getOrCreateMember($oAuth,$drive);
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
                    'message' => 'Lỗi kết nối đến app linkedin! Vui lòng thử lại sau',
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

    /**
     * Call to redirect function instagram
     * @return \Redirect
     */
    public function instagramRedirect()
    {
        return Socialite::driver('instagram')->redirect();
    }

    /**
     * The callback function of instagram
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function instagramCallback()
    {
        $drive = 'instagram';
        $oAuth = Socialite::driver($drive)->user();
        try {
            if ($oAuth) :
                $member = $this->social->getOrCreateMember($oAuth,$drive);
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
                    'message' => 'Lỗi kết nối đến app instagram! Vui lòng thử lại sau',
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

    public function shareFB()
    {
        $share = new Share();
        dd($share->currentPage());
        $share->page('http://jorenvanhocht.be')->facebook();
    }
}
