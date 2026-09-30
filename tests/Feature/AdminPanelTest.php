<?php

use App\Models\User;

it('shows the admin login page', function () {
    $this->get('/admin/login')->assertOk();
});

it('redirects guests to the login page', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

it('shows the dashboard to a logged in in admin', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/admin')->assertOk();
});
