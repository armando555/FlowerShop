<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('messages.home'), route('home'));
});

// Home > Bouquet
Breadcrumbs::for('showBouquet', function ($trail) {
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
    $trail->push(__('messages.listFlowers'), route('flower.show'));
});

// Home > Flowers > details
Breadcrumbs::for('detailsFlower', function ($trail, $data) {
    $trail->parent('showFlower');
    $trail->push($data->getName(), route('flower.show', $data->getId()));
});

Breadcrumbs::for('editFlower', function ($trail, $data) {
    $trail->parent('detailsFlower', $data);
    $trail->push(__('messages.edit'), route('flower.edit', $data->getId()));
});

Breadcrumbs::for('createFlower', function ($trail) {
    $trail->parent('showFlower');
    $trail->push(__('messages.createFlower'), route('flower.create'));
});



// Bouquets

Breadcrumbs::for('detailsBouquet', function ($trail, $data) {
    $trail->parent('showBouquet');
    $trail->push($data->getName(), route('bouquet.show', $data->getId()));
});

Breadcrumbs::for('editBouquet', function ($trail, $data) {
    $trail->parent('detailsBouquet', $data);
    $trail->push(__('messages.edit'), route('bouquet.edit', $data->getId()));
});

Breadcrumbs::for('createBouquet', function ($trail) {
    $trail->parent('showBouquet');
    $trail->push(__('messages.createBouquet'), route('bouquet.create'));
});



// Candy

Breadcrumbs::for('detailsCandy', function ($trail, $data) {
    $trail->parent('showCandy');
    $trail->push($data->getName(), route('candy.show', $data->getId()));
});

Breadcrumbs::for('editCandy', function ($trail, $data) {
    $trail->parent('detailsCandy', $data);
    $trail->push(__('messages.edit'), route('candy.edit', $data->getId()));
});

Breadcrumbs::for('createCandy', function ($trail) {
    $trail->parent('showCandy');
    $trail->push(__('messages.createCandy'), route('candy.create'));
});


// Combos

Breadcrumbs::for('detailsCombo', function ($trail, $data) {
    $trail->parent('showCombo');
    $trail->push($data->getName(), route('combo.show', $data->getId()));
});

Breadcrumbs::for('editCombo', function ($trail, $data) {
    $trail->parent('detailsCombo', $data);
    $trail->push(__('messages.edit'), route('combo.edit', $data->getId()));
});

Breadcrumbs::for('createCombo', function ($trail) {
    $trail->parent('showCombo');
    $trail->push(__('messages.createCombo'), route('combo.create'));
});




// Cart

Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.createCombo'), route('cart.show'));
});

Breadcrumbs::for('bill', function ($trail) {
    $trail->parent('cart');
    $trail->push(__('messages.generatePdf'), route('cart.show'));
});
