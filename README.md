<section class="section"><h1 id="title">Quickstart: Compose and WordPress</h1>
                            <p>You can use Docker Compose to easily run WordPress in an isolated environment
built with Docker containers. This quick-start guide demonstrates how to use
Compose to set up and run WordPress. Before starting, make sure you have
<a href="https://docs.docker.com/compose/install/">Compose installed</a>.</p>
<h3 id="build-the-project">Build the project<a href="#build-the-project" class="anchorLink">🔗</a></h3>
<p>Now, run <code class="language-plaintext highlighter-rouge">docker compose up -d</code> from your project directory.</p>
<p>This runs <a href="/engine/reference/commandline/compose_up/"><code class="language-plaintext highlighter-rouge">docker compose up</code></a> in detached mode, pulls
the needed Docker images, and starts the wordpress and database containers, as shown in
the example below.</p>
<div class="language-console highlighter-rouge"><div class="highlight"><pre class="highlight"><code><span class="gp">$</span><span class="w"> </span>docker compose up <span class="nt">-d</span>
<span class="go">
Creating network "my_wordpress_default" with the default driver
Pulling db (mysql:5.7)...
5.7: Pulling from library/mysql
efd26ecc9548: Pull complete
a3ed95caeb02: Pull complete
</span><span class="c">&lt;...&gt;
</span><span class="go">Digest: sha256:34a0aca88e85f2efa5edff1cea77cf5d3147ad93545dbec99cfe705b03c520de
Status: Downloaded newer image for mysql:5.7
Pulling wordpress (wordpress:latest)...
latest: Pulling from library/wordpress
efd26ecc9548: Already exists
a3ed95caeb02: Pull complete
589a9d9a7c64: Pull complete
</span><span class="c">&lt;...&gt;
</span><span class="go">Digest: sha256:ed28506ae44d5def89075fd5c01456610cd6c64006addfe5210b8c675881aff6
Status: Downloaded newer image for wordpress:latest
Creating my_wordpress_db_1
Creating my_wordpress_wordpress_1
</span></code></pre></div></div>
<blockquote>
  <p><strong>Note</strong>: WordPress Multisite works only on ports <code class="language-plaintext highlighter-rouge">80</code> and/or <code class="language-plaintext highlighter-rouge">443</code>.
If you get an error message about binding <code class="language-plaintext highlighter-rouge">0.0.0.0</code> to port <code class="language-plaintext highlighter-rouge">80</code> or <code class="language-plaintext highlighter-rouge">443</code>
(depending on which one you specified), it is likely that the port you
configured for WordPress is already in use by another service.</p>
</blockquote>
<h3 id="bring-up-wordpress-in-a-web-browser">Bring up WordPress in a web browser<a href="#bring-up-wordpress-in-a-web-browser" class="anchorLink">🔗</a></h3>
<p>At this point, WordPress should be running on port <code class="language-plaintext highlighter-rouge">8000</code> of your Docker Host,
and you can complete the “famous five-minute installation” as a WordPress
administrator.</p>
<blockquote>
  <p><strong>Note</strong>: The WordPress site is not immediately available on port <code class="language-plaintext highlighter-rouge">8000</code>
because the containers are still being initialized and may take a couple of
minutes before the first load.</p>
</blockquote>
<p>If you are using Docker Desktop for Mac or Docker Desktop for Windows, you can use
<code class="language-plaintext highlighter-rouge">http://localhost</code> as the IP address, and open <code class="language-plaintext highlighter-rouge">http://localhost:8000</code> in a web
browser.</p>
<h3 id="shutdown-and-cleanup">Shutdown and cleanup<a href="#shutdown-and-cleanup" class="anchorLink">🔗</a></h3>
<p>The command <code class="language-plaintext highlighter-rouge">docker compose down</code> removes the
containers and default network, but preserves your WordPress database.</p>
<p>The command <code class="language-plaintext highlighter-rouge">docker compose down --volumes</code> removes the containers, default
network, and the WordPress database.</p>
