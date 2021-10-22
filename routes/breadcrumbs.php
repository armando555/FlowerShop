<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('messages.home'), route('home'));
});

// Home > Bouquet
Breadcrumbs::for('indexBouquet', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.listBouquet'), route('bouquet.index'));
});


// Home > Candy
Breadcrumbs::for('showCandy', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.listCandy'), route('candy.index'));
});

// Home > Combo
Breadcrumbs::for('showCombo', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.listCombos'), route('combo.index'));
});

// Home > Flowers
Breadcrumbs::for('showFlower', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.listFlowers'), route('flower.index'));
});

// Home > Flowers > details
Breadcrumbs::for('detailsFlower', function ($trail,$data) {
    $trail->parent('showFlower');
    $trail->push($data->getName(), route('flower.show',$data->getId()));
});

Breadcrumbs::for('editFlower', function ($trail,$data) {
    $trail->parent('detailsFlower');
    $trail->push(__('messages.edit'), route('flower.edit',$data->getId()));
});
