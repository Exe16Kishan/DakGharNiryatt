<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Tracking Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .tracking-container {
            max-width: 900px;
            margin: 0 auto;
        }
        .tracking-card {
            border-radius: 15px;
            border: none;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .tracking-header {
            background: linear-gradient(135deg, #4a6cf7, #2953e8);
            color: white;
            padding: 20px 25px;
            font-size: 1.2rem;
            border-bottom: none;
        }
        .tracking-body {
            padding: 30px;
        }
        .info-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            height: 100%;
            transition: all 0.3s ease;
        }
        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }
        .badge-custom {
            font-size: 0.9rem;
            padding: 8px 15px;
            border-radius: 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .divider {
            height: 3px;
            background: linear-gradient(90deg, #e9ecef 0%, #4a6cf7 50%, #e9ecef 100%);
            margin: 30px 0;
            border-radius: 3px;
        }
        .tracking-table {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            border-radius: 12px;
            overflow: hidden;
        }
        .tracking-table thead th {
            background-color: #f8f9fa;
            border: none;
            padding: 15px 20px;
            font-weight: 600;
            color: #495057;
        }
        .tracking-table tbody tr {
            transition: all 0.2s ease;
        }
        .tracking-table tbody tr:hover {
            background-color: #f1f4ff !important;
        }
        .tracking-table td {
            padding: 15px 20px;
            vertical-align: middle;
            border-top: 1px solid #f1f1f1;
        }
        .location-icon {
            background-color: #e7f0ff;
            color: #4a6cf7;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        .detail-label {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .detail-value {
            font-weight: 500;
            font-size: 1.05rem;
            margin-bottom: 0;
        }
        .empty-alert {
            border-radius: 12px;
            padding: 20px;
            background-color: #fff9eb;
            border-left: 4px solid #ffc107;
            color: #856404;
        }
        .shipping-status {
            margin-bottom: 25px;
            padding: 15px 25px;
            border-radius: 12px;
            background-color: #e7f7ee;
            border-left: 4px solid #28a745;
            font-weight: 500;
        }
        @media (max-width: 768px) {
            .tracking-body {
                padding: 20px 15px;
            }
            .address-row {
                flex-direction: column;
            }
            .address-row > div {
                text-align: left !important;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="tracking-container animate__animated animate__fadeIn animate__slow" wire:target="trackItem" wire:loading.class.add="animate__fadeOut">
        <div class="tracking-card shadow">
            <div class="tracking-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-box-open me-2"></i>
                    Tracking Details for <strong>{{ $item->tracking_number }}</strong>
                </div>
                <div>
                    <span class="badge badge-custom bg-light text-dark">
                        <i class="fas fa-clock me-1"></i>
                        @if (!is_null($item->shipped_on))
                            Shipped {{ $item->shipped_on->format('n/j/Y') }}
                        @else
                            Not Shipped
                        @endif
                    </span>
                </div>
            </div>
            
            <div class="tracking-body">
                <!-- Shipping Status Banner -->
                <div class="shipping-status">
                    <i class="fas fa-truck me-2"></i>
                    <span>Package in transit</span> - Estimated delivery in 2-3 business days
                </div>
                
                <!-- Address Information -->
                <div class="row address-row mb-4">
                    <!-- Sender -->
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="info-card">
                            <div class="detail-label">
                                <i class="fas fa-paper-plane me-2 text-primary"></i>FROM
                            </div>
                            <h5 class="detail-value mb-3">Sender</h5>
                            <p class="mb-0 text-muted">
                                {!! nl2br($item->sender->address) !!}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Receiver -->
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="detail-label">
                                <i class="fas fa-home me-2 text-success"></i>TO
                            </div>
                            <h5 class="detail-value mb-3">Receiver</h5>
                            <p class="mb-0 text-muted">
                                {!! nl2br($item->receiver->address) !!}
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Package Details -->
                <div class="row mb-4">
                    <!-- Type -->
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="info-card text-center">
                            <div class="detail-label">
                                <i class="fas fa-shipping-fast me-2 text-primary"></i>SHIPMENT TYPE
                            </div>
                            <div class="mt-3">
                                <span class="badge badge-custom bg-primary">{{ str($item->shipment_type->value)->upper() }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Weight -->
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="info-card text-center">
                            <div class="detail-label">
                                <i class="fas fa-weight-hanging me-2 text-primary"></i>WEIGHT
                            </div>
                            <h4 class="detail-value mt-3">
                                {{ $item->weight['pounds'] }}<small class="text-muted"> lbs </small>
                                {{ $item->weight['ounces'] }}<small class="text-muted"> oz</small>
                            </h4>
                        </div>
                    </div>
                    
                    <!-- Ship Date -->
                    <div class="col-md-4">
                        <div class="info-card text-center">
                            <div class="detail-label">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>SHIPPED ON
                            </div>
                            <h4 class="detail-value mt-3">
                                @if (!is_null($item->shipped_on))
                                    {{ $item->shipped_on->format('n/j/Y') }}
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
                
                <div class="divider"></div>
                
                <!-- Tracking Events -->
                <h5 class="mb-4">
                    <i class="fas fa-history me-2 text-primary"></i>
                    Tracking History
                </h5>
                
                @forelse ($item->events as $event)
                    <div class="tracking-table">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th width="25%">Date & Time</th>
                                        <th width="35%">Location</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:key="item-tracking-event-{{ $event->id }}">
                                        <!-- Date & Time -->
                                        <td>
                                            <div class="fw-bold">{{ $event->occurred_at->format('n/j/Y') }}</div>
                                            <div class="text-muted">{{ $event->occurred_at->format('g:ia') }}</div>
                                        </td>
                                        
                                        <!-- Location -->
                                        <td>
                                            <div>
                                                <span class="location-icon">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </span>
                                                {{ $event->location }}
                                            </div>
                                        </td>
                                        
                                        <!-- Details -->
                                        <td>{{ $event->details }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @empty
                    <div class="empty-alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        No tracking events available at this time. Please check back later.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>