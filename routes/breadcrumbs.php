<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\User;
use App\Models\Product;
use App\Models\Slider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin', route('dashboard'));
});
Breadcrumbs::for('login', function (BreadcrumbTrail $trail): void {
    $trail->push('Login', route('login'));
});

// users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Usuários', route('users.index'));
});
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('users.index');

    $user = User::where('id', $id)->first();
    $trail->push($user->name, route('users.show', $id));
});
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('users.show', $id);

    $trail->push('Editar', route('users.edit', $id));
});
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('users.index');

    $trail->push("Criar", route('users.create'));
});

// products
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Produtos', route('products.index'));
});
Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('products.index');

    $produto = Product::where('id', $id)->first();
    $trail->push($produto->name, route('products.show', $id));
});
Breadcrumbs::for('products.edit', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('products.show', $id);

    $trail->push('Editar', route('products.edit', $id));
});
Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('products.index');

    $trail->push("Criar", route('products.create'));
});

// roles
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Cargos', route('roles.index'));
});
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('roles.index');

    $role = Role::where('id', $id)->first();
    $trail->push($role->name, route('roles.show', $id));
});
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('roles.show', $id);

    $trail->push('Editar', route('roles.edit', $id));
});
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('roles.index');

    $trail->push("Criar", route('roles.create'));
});

// permissions
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Permissões', route('permissions.index'));
});
Breadcrumbs::for('permissions.show', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('permissions.index');

    $perm = Permission::where('id', $id)->first();
    $trail->push($perm->name, route('permissions.show', $id));
});
Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('permissions.show', $id);

    $trail->push('Editar', route('permissions.edit', $id));
});
Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('permissions.index');

    $trail->push("Criar", route('permissions.create'));
});

// sliders
Breadcrumbs::for('sliders.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Sliders', route('sliders.index'));
});
Breadcrumbs::for('sliders.show', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('sliders.index');

    $slider = Slider::where('id', $id)->first();
    $trail->push($slider->titulo, route('sliders.show', $id));
});
Breadcrumbs::for('sliders.edit', function (BreadcrumbTrail $trail, int $id): void {
    $trail->parent('sliders.show', $id);

    $trail->push('Editar', route('sliders.edit', $id));
});
Breadcrumbs::for('sliders.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('sliders.index');

    $trail->push("Criar", route('sliders.create'));
});
