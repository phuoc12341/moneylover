<?php

namespace App\Repo;

use App\Repo\SocialRepositoryInterface;

use App\Models\Social;

class SocialRepository implements SocialRepositoryInterface
{
    public function getListSocial()
    {
        $listSocial = Social::all();

        return $listSocial;
    }

    public function createNewSocial($request)
    {
        $social = new Social;
        $social->url = $request->url;
        $social->icon = $request->icon;
        $social->save();

        return $social;
    }

    public function showFormEditSocial($id)
    {
        $social = Social::find($id);

        return $social;
    }

    public function updateSocial($request, $id)
    {
        $social = Social::find($id);

        $social->url = $request->url;
        $social->icon = $request->icon;
        $social->save();

        return $social;
    }

    public function deleteSocial($id)
    {
        $social = Social::find($id);
        $id = $social->delete();

        return $id;
    }
}
