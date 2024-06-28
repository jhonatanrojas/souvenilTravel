<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('product_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/product-categories*") ? "c-show" : "" }} {{ request()->is("admin/product-tags*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/prestadores-de-servicios*") ? "c-show" : "" }} {{ request()->is("admin/clientes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productCategory.title') }}
                            </a>
                        </li>

                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sub-categoria.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-categoria") || request()->is("admin/sub-categoria/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('SubCategoria') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('prestadores_de_servicio_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.prestadores-de-servicios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/prestadores-de-servicios") || request()->is("admin/prestadores-de-servicios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.prestadoresDeServicio.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('cliente_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clientes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clientes") || request()->is("admin/clientes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cliente.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('listum_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/estados*") ? "c-show" : "" }} {{ request()->is("admin/municipios*") ? "c-show" : "" }} {{ request()->is("admin/destinos*") ? "c-show" : "" }} {{ request()->is("admin/idiomas*") ? "c-show" : "" }} {{ request()->is("admin/divisas*") ? "c-show" : "" }} {{ request()->is("admin/estatus-reservas*") ? "c-show" : "" }} {{ request()->is("admin/estatus-pagos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.listum.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('estado_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.estados.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/estados") || request()->is("admin/estados/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.estado.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('municipio_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.municipios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/municipios") || request()->is("admin/municipios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.municipio.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('destino_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.destinos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/destinos") || request()->is("admin/destinos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.destino.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('idioma_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.idiomas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/idiomas") || request()->is("admin/idiomas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.idioma.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('divisa_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.divisas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/divisas") || request()->is("admin/divisas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.divisa.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('estatus_reserva_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.estatus-reservas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/estatus-reservas") || request()->is("admin/estatus-reservas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.estatusReserva.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('estatus_pago_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.estatus-pagos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/estatus-pagos") || request()->is("admin/estatus-pagos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.estatusPago.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('content_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/content-categories*") ? "c-show" : "" }} {{ request()->is("admin/content-tags*") ? "c-show" : "" }} {{ request()->is("admin/content-pages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contentManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('content_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentPage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('administrar_reserva_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reservas*") ? "c-show" : "" }} {{ request()->is("admin/detalle-de-reservas*") ? "c-show" : "" }} {{ request()->is("admin/pagos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.administrarReserva.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('reserva_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reservas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reservas") || request()->is("admin/reservas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reserva.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('detalle_de_reserva_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.detalle-de-reservas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/detalle-de-reservas") || request()->is("admin/detalle-de-reservas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.detalleDeReserva.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pago_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pagos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pagos") || request()->is("admin/pagos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pago.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('configuracion_general_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/enlaces*") ? "c-show" : "" }} {{ request()->is("admin/bloques-paginas*") ? "c-show" : "" }} {{ request()->is("admin/admin-configs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.configuracionGeneral.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('enlace_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.enlaces.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/enlaces") || request()->is("admin/enlaces/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.enlace.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('bloques_pagina_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.bloques-paginas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bloques-paginas") || request()->is("admin/bloques-paginas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bloquesPagina.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('admin_config_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.admin-configs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/admin-configs") || request()->is("admin/admin-configs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.adminConfig.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('banner_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.banners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/banners") || request()->is("admin/banners/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.banner.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>