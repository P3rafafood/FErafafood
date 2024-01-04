<div>
    <li class="nav-item dropdown me-3">
        <a class="nav-link active dropdown-toggle text-gray-600" href="#"
            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <i class='bi bi-bell bi-sub fs-4'></i>
            <span class="badge badge-notification bg-danger">{{ $count }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
            aria-labelledby="dropdownMenuButton">
            <li class="dropdown-header">
                <h6>Notifications</h6>
            </li>
            @forelse ($notifications as $notif)
                <li class="dropdown-item notification-item">
                    <a class="d-flex align-items-center" href="#">
                        <div class="notification-icon bg-primary">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <div class="notification-text ms-4">
                            <p class="notification-title font-bold">Pesanan Baru</p>
                            <p class="notification-subtitle font-thin text-sm">Meja No {{ $notif->table_number }}</p>
                        </div>
                    </a>
                </li>
            @empty
                <li class="dropdown-item notification-item">Tidak Ada Pesanan Baru</li>
            @endforelse
            @if (count($notifications) > 0)
                <li>
                    <p class="text-center py-2 mb-0"><a href="{{ route('admin.order.today') }}">See all notification</a></p>
                </li>
            @endif
        </ul>
    </li>
</div>
