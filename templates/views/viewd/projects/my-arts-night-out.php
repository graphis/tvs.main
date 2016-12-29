<?php
$project = 'my-arts-night-out';
include '_init.php';
?>
<section id="<?php echo $project; ?>" class="work-item">
    <div>
        <h1>
            My Arts Night Out
        </h1>
        <button class="btn-block btn-gallery" id="gallery">
            screenshots
        </button>
        <a href="http://myartsnightout.com" class="btn-block btn-external">
            visit site
        </a>
        <p>
            A light-weight but powerful CMS that allows administrators to
            manage venues, exhibits, artists, and sponsors. Venue locations
            are mapped out with Google Maps integration and auto assigned to
            one of four greater Lansing areas based on inputted address.
        </p>
        <p>
            The client requested a toggle that would allow users to view the
            site in either default &ldquo;venue mode&rdquo; or &ldquo;artist
            mode&rdquo;. I created this toggle with jQuery and JavaScript
            Cookie to preserve the user&rsquo;s choice while browsing the site
            and remember their preference for a week.
        </p>
        <p>
            developed with <abbr title="teamwork">
            <i class="fa fa-handshake-o" aria-hidden="true"></i></abbr> at
            <a href="http://virtualredhead.com">Redhead Design Studio</a>
        </p>
        <p>
            <a class="btn-block btn-back" href="/projects">
                return to projects index
            </a>
        </p>
    </div>
</section>
