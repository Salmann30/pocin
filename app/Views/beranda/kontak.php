<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>

<style>
       .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .contact-section {
            padding: 50px 0;
            text-align: center;
        }
        
        .section-title {
            margin-bottom: 40px;
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }
        
        .contact-cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }
        
        .contact-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
        }
        
        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: #c52d2f;
            border-radius: 0 0 4px 4px;
        }
        
        .icon-container {
            margin-top: 20px;
            margin-bottom: 15px;
        }
        
        .contact-icon {
            font-size: 24px;
            color: #28a745; /* Green color for icons */
        }
        
        .contact-type {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        
        .contact-detail {
            font-size: 14px;
            color: #666;
        }
        
        .map-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-top: 30px;
        }
        
        .address-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .address-icon {
            width: 60px;
            height: 60px;
            background-color: #c52d2f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }
        
        .address-icon i {
            color: white;
            font-size: 24px;
        }
        
        .address-text {
            text-align: left;
            font-size: 14px;
            color: #666;
        }
        
        .address-title {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        
        .map-container {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        .wavy-bg {
            width: 100%;
            height: 100px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="1" d="M0,96L80,101.3C160,107,320,117,480,112C640,107,800,85,960,90.7C1120,96,1280,128,1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
            margin-top: -50px;
            margin-bottom: -50px;
        }
        
        @media (max-width: 768px) {
            .contact-cards {
                flex-direction: column;
                align-items: center;
            }
            
            .contact-card {
                width: 80%;
                max-width: 300px;
            }
            
            .address-container {
                flex-direction: column;
                text-align: center;
            }
            
            .address-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .address-text {
                text-align: center;
            }
        }

        .contact-section {
    background-color: #f8f9fa;
}

.divider-custom {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 1.5rem 0;
}

.divider-line {
    width: 80px;
    height: 2px;
    background-color: rgba(var(--bs-primary-rgb), 0.3);
}

.divider-icon {
    color: var(--bs-primary);
    padding: 0 1rem;
    font-size: 1rem;
}

    </style>


<!-- Contact Start -->
<div class="contact-section  mt-5">
    <div class="container pt-5">
                <!-- Header with subtle decoration -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-primary-subtle text-primary mb-2 fs-4">Kontak Kami</span>
                <h2 class="display-5 fw-bold mb-4">Tetap Terhubung dengan Kami</h2>
                
                <p class="lead text-muted">Kami siap membantu dan menjawab pertanyaan Anda</p>
            </div>
        </div>
            
            <div class="contact-cards"> 
                <!-- WhatsApp Card -->
                <div class="contact-card">
                    <div class="icon-container">
                        <i class="fab fa-whatsapp contact-icon"></i>
                    </div>
                    <h3 class="contact-type">WHATSAPP</h3>
                    <p class="contact-detail">087788899991</p>
                </div>
                
                <!-- Email Card -->
                <div class="contact-card">
                    <div class="icon-container">
                        <i class="far fa-envelope contact-icon"></i>
                    </div>
                    <h3 class="contact-type">EMAIL</h3>
                    <p class="contact-detail">info@mekarsari.com</p>
                </div>
                
                <!-- Phone Card -->
                <div class="contact-card">
                    <div class="icon-container">
                        <i class="fas fa-phone-alt contact-icon"></i>
                    </div>
                    <h3 class="contact-type">PHONE</h3>
                    <p class="contact-detail">+6211 456 789</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wavy-bg"></div>
    
    <div class="container">
        <div class="map-section">
            <div class="address-container">
                <div class="address-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="address-text">
                    <h3 class="address-title">Jalan Margonda Raya No. 54,</h3>
                    <p>Pancoran Mas, Depok City, West Java 16431</p>
                </div>
            </div>
            
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.992439063215!2d106.8190222373663!3d-6.394975094674184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebe3945bbcb7%3A0xcc3596eb8b070d4a!2sJl.%20Margonda%20Raya%20No.54%2C%20Depok%2C%20Kec.%20Pancoran%20Mas%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016431!5e0!3m2!1sen!2sid!4v1745821088451!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
<!-- Contact End -->

<?= $this->endSection(); ?>