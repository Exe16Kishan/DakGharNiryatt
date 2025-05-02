<!-- Tracking Section with Improved Design -->
<div class="container tracking-container my-5 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Track Item Header -->
            <div class="tracking-header text-center mb-4">
                <div class="tracking-icon-wrapper mb-3">
                    <i class="fa-solid fa-location-dot tracking-icon-primary"></i>
                </div>
                <h2 class="tracking-title">Track Your Item <i class="fa-solid fa-magnifying-glass fa-flip-horizontal ms-2 text-primary"></i></h2>
                <p class="tracking-subtitle">Enter your item's tracking number below and instantly find out its status within our network.</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <!-- Track Item Form -->
                    <div class="tracking-card">
                        <div class="tracking-card-body">
                            <form wire:submit.prevent="trackItem">
                                <div class="tracking-input-group">
                                    <div class="input-wrapper">
                                        <span class="input-icon">
                                            <i class="fa-solid fa-barcode"></i>
                                        </span>
                                        <input 
                                            wire:model.defer="tracking_number" 
                                            class="tracking-input" 
                                            type="text" 
                                            placeholder="e.g. PL681936433070107DOM" 
                                            aria-label="Track Item"
                                        >
                                    </div>
                                    <button id="track-item-submit" class="tracking-btn" type="submit">
                                        <span>Track Now</span>
                                        <i class="fa-solid fa-arrow-right ms-2"></i>
                                        <i wire:loading class="fa-solid fa-spinner fa-spin ms-1 loading-spinner"></i>
                                    </button>
                                </div>
                                
                                @error('tracking_number')
                                    @foreach ($errors->get('tracking_number') as $error)
                                        <!-- If the error is due to invalid format, show a more detailed error -->
                                        @if ($error == 'The tracking number field format is invalid.')
                                            <div class="tracking-alert animate__animated animate__fadeIn" role="alert">
                                                <div class="alert-icon">
                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                </div>
                                                <div class="alert-content">
                                                    <h4 class="alert-heading">Invalid Tracking Number</h4>
                                                    <p>Hmm, that doesn't look like a proper PoŝtaLoĝistiko tracking number. <strong>It should:</strong></p>
                                                    
                                                    <ul class="alert-list">
                                                        <li><span class="code-sample">Start with "PL"</span></li>
                                                        <li><span class="code-sample">Contain a 15-digit unique identifier</span></li>
                                                        <li><span class="code-sample">End with "DOM" for domestic or "INT" for international</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @else
                                            <div class="tracking-error animate__animated animate__fadeIn">
                                                <i class="fa-solid fa-circle-exclamation me-2"></i>
                                                {{ $error }}
                                            </div>
                                        @endif
                                    @endforeach
                                @enderror
                            </form>
                        </div>
                    </div>
                    
                    <!-- Item Tracking Progress & Details -->
                    @if ($item)
                        <div class="tracking-results animate__animated animate__fadeIn">
                            <!-- Tracking Progress -->
                            @include('partials.track-item.tracking-progress')
                            
                            <!-- Tracking Details -->
                            @include('partials.track-item.tracking-details')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        // If the tracking number exists as query param in the URL programmatically
        // click the "Track" button (as Livewire will fill the input field but not fire the action)
        const url_params = new URLSearchParams(location.search);
        
        if (url_params.has('tn') && url_params.get('tn') != '') {
            document.getElementById('track-item-submit').click();
        }
        
        // Update the tab title to reflect the item's status once it's details have been fetched
        Livewire.on('trackingDetailsFetched', (tracking_number, item_status) => {
            let new_title = `📦 ${item_status} - ${tracking_number} | PoŝtaLoĝistiko`;
            document.title = new_title;
        });
    });
</script>

<style>
/* Tracking Container */
.tracking-container {
    padding: 3rem 1.5rem;
    position: relative;
}

.tracking-container::before {
    content: '';
    position: absolute;
    width: 200px;
    height: 200px;
    background: rgba(32, 131, 54, 0.05);
    border-radius: 50%;
    top: -50px;
    right: -50px;
    z-index: -1;
}

.tracking-container::after {
    content: '';
    position: absolute;
    width: 150px;
    height: 150px;
    background: rgba(255, 153, 51, 0.06);
    border-radius: 50%;
    bottom: -30px;
    left: -30px;
    z-index: -1;
}

/* Tracking Header */
.tracking-header {
    margin-bottom: 2.5rem;
}

.tracking-icon-wrapper {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 90px;
    height: 90px;
    background: linear-gradient(135deg, rgba(32, 131, 54, 0.1) 0%, rgba(19, 136, 8, 0.15) 100%);
    border-radius: 50%;
    margin-bottom: 1.25rem;
    position: relative;
}

.tracking-icon-primary {
    font-size: 2.5rem;
    color: var(--primary);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(0.95);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(0.95);
    }
}

.tracking-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 1rem;
    position: relative;
    display: inline-block;
}

.tracking-title::after {
    content: '';
    position: absolute;
    width: 80px;
    height: 3px;
    background: var(--primary);
    bottom: -12px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 10px;
}

.tracking-subtitle {
    font-size: 1.15rem;
    color: var(--gray-600);
    max-width: 700px;
    margin: 1.5rem auto 0;
    line-height: 1.6;
}

/* Tracking Card */
.tracking-card {
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.03);
    overflow: hidden;
    margin-bottom: 3rem;
}

.tracking-card:hover {
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
    transform: translateY(-4px);
}

.tracking-card-body {
    padding: 2.5rem;
}

/* Tracking Input Group */
.tracking-input-group {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: center;
}

.input-wrapper {
    flex: 1;
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon {
    position: absolute;
    left: 20px;
    color: var(--gray-500);
    font-size: 1.15rem;
}

.tracking-input {
    flex: 1;
    height: 60px;
    border: 2px solid var(--gray-200);
    border-radius: 50px;
    padding: 0 2rem 0 3.5rem;
    font-size: 1.05rem;
    color: var(--gray-700);
    width: 100%;
    transition: all 0.3s ease;
    background-color: #f9f9fd;
}

.tracking-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(32, 131, 54, 0.1);
    outline: none;
    background-color: #fff;
}

.tracking-input::placeholder {
    color: var(--gray-400);
    font-size: 1rem;
}

.tracking-btn {
    height: 60px;
    padding: 0 2.25rem;
    border-radius: 50px;
    background-color: var(--primary);
    color: white;
    font-weight: 600;
    font-size: 1rem;
    border: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(32, 131, 54, 0.2);
}

.tracking-btn::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(255,255,255,0.1), rgba(255,255,255,0.2));
    transform: skewX(-20deg) translateX(-100%);
    transition: all 0.6s ease;
}

.tracking-btn:hover {
    background-color: var(--primary-dark);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(32, 131, 54, 0.3);
}

.tracking-btn:hover::before {
    transform: skewX(-20deg) translateX(100%);
}

.tracking-btn:active {
    transform: translateY(0);
    box-shadow: 0 5px 15px rgba(32, 131, 54, 0.2);
}

.loading-spinner {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
}

/* Tracking Alert */
.tracking-alert {
    margin-top: 2rem;
    padding: 1.5rem;
    border-radius: 12px;
    background-color: #fff3cd;
    border-left: 5px solid #ffc107;
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
}

.alert-icon {
    color: #ff9500;
    font-size: 2rem;
    flex-shrink: 0;
}

.alert-content {
    flex: 1;
}

.alert-heading {
    color: #664d03;
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
    font-weight: 600;
}

.alert-list {
    padding-left: 1.25rem;
    margin-top: 0.75rem;
    margin-bottom: 0;
}

.alert-list li {
    padding: 0.5rem 0;
    color: #664d03;
}

.code-sample {
    display: inline-block;
    background-color: rgba(255, 255, 255, 0.6);
    border-radius: 4px;
    padding: 0.2rem 0.5rem;
    font-family: monospace;
    font-size: 0.95rem;
    color: #664d03;
    border: 1px solid rgba(255, 193, 7, 0.3);
}

/* Tracking Error */
.tracking-error {
    margin-top: 1rem;
    display: flex;
    align-items: center;
    color: #dc3545;
    font-size: 0.95rem;
    padding-left: 0.5rem;
}

/* Tracking Results */
.tracking-results {
    margin-top: 2rem;
}

/* Responsive Adjustments */
@media (max-width: 767.98px) {
    .tracking-card-body {
        padding: 1.75rem;
    }
    
    .tracking-input-group {
        flex-direction: column;
    }
    
    .tracking-input {
        width: 100%;
    }
    
    .tracking-btn {
        width: 100%;
    }
    
    .tracking-title {
        font-size: 2rem;
    }
    
    .tracking-subtitle {
        font-size: 1rem;
    }
    
    .tracking-icon-wrapper {
        width: 70px;
        height: 70px;
    }
    
    .tracking-icon-primary {
        font-size: 2rem;
    }
    
    .tracking-alert {
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 1.25rem;
    }
    
    .alert-content h4 {
        margin-top: 0.5rem;
    }
    
    .alert-list {
        text-align: left;
    }
}
</style>