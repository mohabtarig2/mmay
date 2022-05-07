<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.models.admin.{id}', function ($admin, $id) {
//     return (int) $admin->id === (int) $id;
// });
Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('newComment.{tender_id}', function ($user, $tender_id) {
    return true;
});

Broadcast::channel('newTender.{tender_id}', function ($user, $tender_id) {
    return true;
});

Broadcast::channel('NewTenderConsulte.{tender_id}', function ($user, $tender_id) {
    return true;
});

Broadcast::channel('reJectCOnsulteTender.{tender_id}', function ($user, $tender_id) {
    return true;
});

Broadcast::channel('reJectCOnsulteTender.{tender_id}', function ($user, $tender_id) {
    return true;
});


Broadcast::channel('retenderConsulte.{tender_id}', function ($user, $tender_id) {
    return true;
});
Broadcast::channel('commentConsr.{tender_id}', function ($user, $tender_id) {
    return true;
});
Broadcast::channel('ConsulteAdminOffer.{tender_id}', function ($user, $tender_id) {
    return true;
});

// Broadcast::channel('TenderRequestFromCompany.{tender_id}', function ($admin , $tender_id) {
//     return true;
// });


// Broadcast::channel('companyDoneConsulte.{tender_id}', function ($admin , $tender_id) {
//     return true;
// });

// Broadcast::channel('companyCancelConsulte.{tender_id}', function ($admin , $tender_id) {
//     return true;
// });

// Broadcast::channel('NewTenderConstruction.{tender_id}', function ($admin , $tender_id) {
//     return true;
// });

Broadcast::channel('RejectConstructionTender.{tender_id}', function ($user , $tender_id) {
    return true;
});


// Broadcast::channel('RetenderConstruction.{tender_id}', function ($admin , $tender_id) {
//     return true;
// });

// Broadcast::channel('UpdateTitleConstruction.{tender_id}', function ($admin , $tender_id) {
//     return true;
// });

Broadcast::channel('CompleteConstructionTender.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('companyDoneConstruction.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('companyCancelConstruction.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('UserCancelConstruction.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('NewOfferHvac.{tender_id}', function ($user , $tender_id) {
    return true;
});

Broadcast::channel('confirmHvacOffer.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('CompleteHvacTender.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('rejectHvactTender.{tender_id}', function ($user , $tender_id) {
    return true;
});

Broadcast::channel('reviewTender.{request_id}', function ($user , $requet_id) {
    return true;
});


Broadcast::channel('NewTenderStone.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('acceptStoneTender.{tender_id}', function ($user , $tender_id) {
    return true;
});

Broadcast::channel('NewStoneOffer.{tender_id}', function ($user , $tender_id) {
    return true;
});

Broadcast::channel('ConfirmRequestofferStone.{tender_id}', function ($user , $tender_id) {
    return true;
});


Broadcast::channel('CompleteStoneTender.{tender_id}', function ($user , $tender_id) {
    return true;
});

Broadcast::channel('chat.{offer_id}', function ($user , $offer_id) {
    // return Auth::check();
    return true;
});


























