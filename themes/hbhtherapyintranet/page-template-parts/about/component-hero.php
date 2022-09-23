<div class="section abtsection abt-hero">
<div class="section-content hero-wrap" href="#about">
    <h1 class="pg-title abt-pg-title"><?php the_field( 'about_page_title' ); ?></h1>
    <p class="srvpg-summary abt-sum"><?php the_field( 'about_hero_text' ); ?></p>
</div>

<div class="section-content">
    <div class="about-filter-wrap desktop">
        
        <a class="button-filter-wrap" href="#offices">
            <button class="button-filter">Offices</button>
        </a>
        
        <a class="button-filter-wrap" href="#ef">
            <button class="button-filter">Membership Benefits</button>
        </a>
        
        <a class="button-filter-wrap" href="#ins">
            <button class="button-filter">Insurance</button>
        </a>
        
        <a class="button-filter-wrap" href="#covid">
            <button class="button-filter">Covid Response</button>
        </a>
        
        <a class="button-filter-wrap" href="#career">
            <button class="button-filter">Careers</button>
        </a>
    
    </div>
    
    <div class="about-filter-wrap mobile">
        
        <div class="select"><select class="service-filters" data-width="100%" id="dynamic_select">
            <option value="/about-us/#about">Go To Section</option>
            <option value="/about-us/#offices">Offices</option>
            <option value="/about-us/#ef">Membership Benefits</option>
            <option value="/about-us/#ins">Insurance</option>
            <option value="/about-us/#covid">Covid Response</option>
            <option value="/about-us/#career">Careers</option>

        </select></div>
    
    </div>
</div>
</div>