<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Tracking Progress</title>
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
        .tracking-progress-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 35px 25px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        .tracking-progress-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #4a6cf7, #2953e8);
        }
        .tracking-progress-wrapper {
            display: flex;
            justify-content: space-between;
            position: relative;
            z-index: 1;
        }
        .tracking-progress-wrapper::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
            height: 6px;
            background-color: #e9ecef;
            border-radius: 8px;
            z-index: -1;
        }
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
            flex: 1;
            transition: all 0.4s ease;
        }
        .step .icon {
            width: 80px;
            height: 80px;
            background-color: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: #6c757d;
            margin-bottom: 15px;
            position: relative;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        .step .text {
            color: #6c757d;
            font-weight: 600;
            font-size: 1rem;
            text-align: center;
            transition: all 0.4s ease;
            margin-top: 5px;
        }
        .step.active .icon {
            background: linear-gradient(135deg, #4a6cf7, #2953e8);
            color: white;
            box-shadow: 0 8px 20px rgba(74, 108, 247, 0.3);
        }
        .step.active .text {
            color: #2953e8;
        }
        .step.current .icon {
            transform: scale(1.1);
            box-shadow: 0 12px 25px rgba(74, 108, 247, 0.4);
        }
        .step.current .text {
            font-weight: 700;
        }
        .step.delivered .icon {
            background: linear-gradient(135deg, #28a745, #20c997);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
        }
        .step.delivered .text {
            color: #28a745;
        }
        
        /* Progress line styling */
        .tracking-progress-wrapper .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 40px;
            right: 50%;
            width: 100%;
            height: 6px;
            background-color: #4a6cf7;
            border-radius: 8px;
            z-index: -1;
            transition: all 0.3s ease;
        }
        .step:not(.active):not(:last-child)::after {
            background-color: #e9ecef;
        }
        
        /* Alert styling */
        .in-system-alert {
            background-color: #fff9eb;
            border-left: 5px solid #ffc107;
            padding: 25px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            margin: 30px 0;
        }
        .alert-icon {
            background-color: #fff0c0;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 20px;
            font-size: 24px;
            color: #ffc107;
        }
        .alert-content {
            flex: 1;
        }
        .alert-content h4 {
            color: #856404;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .alert-content p {
            color: #856404;
            margin-bottom: 0;
            font-size: 1.05rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .tracking-progress-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }
            .tracking-progress-wrapper::before {
                top: 40px;
                left: 40px;
                width: 6px;
                height: calc(100% - 80px);
            }
            .step {
                flex-direction: row;
                width: 100%;
                margin-bottom: 30px;
                align-items: center;
            }
            .step .icon {
                margin-bottom: 0;
                margin-right: 20px;
            }
            .step .text {
                text-align: left;
                margin-top: 0;
            }
            .tracking-progress-wrapper .step:not(:last-child)::after {
                top: 50%;
                left: 40px;
                width: 6px;
                height: 100%;
                right: auto;
            }
        }
    </style>
</head>
<body>
    <div class="tracking-container animate__animated animate__fadeIn" wire:target="trackItem" wire:loading.class.add="animate__fadeOut">
        @if ($item->status->value != 'in_system')
            <div class="tracking-progress-card">
                <h4 class="mb-4 text-center fw-bold text-primary">
                    <i class="fas fa-truck-fast me-2"></i> Shipment Progress
                </h4>
                
                <div class="tracking-progress-wrapper">
                    {{-- Picked Up --}}
                    <div wire:loading.class.remove="animate__fadeInLeft"
                        @class([
                        'step',
                        'active' => $item->status->isCurrentStatus('picked_up') || $item->status->isPreviousStatus('picked_up'),
                        'current' => $item->status->isCurrentStatus('picked_up'),
                        'animate__animated animate__fadeInLeft' => $item->status->isCurrentStatus('picked_up')
                    ])>
                        <span class="icon">
                            <i class="fa-solid fa-cart-flatbed"></i>
                        </span>
                        <span class="text">Picked Up</span>
                    </div>
                    
                    {{-- In Transit --}}
                    <div wire:loading.class.remove="animate__fadeInLeft"
                        @class([
                        'step',
                        'active' => $item->status->isCurrentStatus('in_transit') || $item->status->isPreviousStatus('in_transit'),
                        'current' => $item->status->isCurrentStatus('in_transit'),
                        'animate__animated animate__fadeInLeft' => $item->status->isCurrentStatus('in_transit')
                    ])>
                        <span class="icon">
                            <i class="fa-solid fa-truck-ramp-box"></i>
                        </span>
                        <span class="text">In Transit</span>
                    </div>
                    
                    {{-- Dispatched --}}
                    <div wire:loading.class.remove="animate__fadeInLeft"
                        @class([
                        'step',
                        'active' => $item->status->isCurrentStatus('dispatched') || $item->status->isPreviousStatus('dispatched'),
                        'current' => $item->status->isCurrentStatus('dispatched'),
                        'animate__animated animate__fadeInLeft' => $item->status->isCurrentStatus('dispatched')
                    ])>
                        <span class="icon">
                            <i class="fa-solid fa-truck"></i>
                        </span>
                        <span class="text">Dispatched</span>
                    </div>
                    
                    {{-- Delivered --}}
                    <div wire:loading.class.remove="animate__fadeInLeft"
                        @class([
                        'step',
                        'active current delivered animate__animated animate__fadeInLeft' => $item->status->isCurrentStatus('delivered')
                    ])>
                        <span class="icon">
                            <i class="fa-solid fa-house-circle-check"></i>
                        </span>
                        <span class="text">Delivered!</span>
                    </div>
                </div>
                
                <!-- Estimated Delivery Section (Optional enhancement) -->
                <div class="mt-5 text-center">
                    <p class="text-muted mb-0">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Estimated delivery: <strong>May 5, 2025</strong>
                    </p>
                </div>
            </div>
        @else
            {{-- In System Message --}}
            <div class="in-system-alert animate__animated animate__fadeIn">
                <div class="alert-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div class="alert-content">
                    <h4>Package Registered</h4>
                    <p>This item is in our system but not yet within our custody. More details will be available once it is.</p>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>