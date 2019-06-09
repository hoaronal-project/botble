<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/8/2019
 * Time: 11:58 PM
 */

namespace Botble\Member\Repositories\Eloquent;


use Botble\Member\Models\Member;
use Botble\Member\Repositories\Interfaces\SocialInterface;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravolt\Avatar\Avatar;

class SocialRepositories implements SocialInterface
{
    /**
     * Get member if member is
     * @param ProviderUser $user
     * @param string $provider
     * @return Member
     * @throws \Exception
     */
    public function getOrCreateMember(ProviderUser $user, $provider)
    {
        $member = Member::whereProvider($provider)
            ->where($provider . '_id', $user->getId())
            ->first();
        $avatar = new Avatar();
        try {
            if ($member && $member != null) {
                return $member;
            } else {
                DB::beginTransaction();
                $member = new Member([
                    $provider . '_id' => $user->getId(),
                    'provider' => $provider,
                    'email' => $user->getEmail() ?? 'email@example.com',
                    'first_name' => $user->getName() ?? 'Social user',
                    'social_avatar' => $user->getAvatar() ?? $avatar->create($user->getName()),
                ]);
                $member->save();
                DB::commit();
                return $member;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new \Exception($th->getMessage());
        }
    }
}
