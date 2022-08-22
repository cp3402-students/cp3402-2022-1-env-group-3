<section class="section"><h1 id="title">Quickstart: Compose and WordPress</h1>
                            <p>You can use Docker Compose to easily run WordPress in an isolated environment
built with Docker containers. This quick-start guide demonstrates how to use
Compose to set up and run WordPress. Before starting, make sure you have
<a href="/compose/install/">Compose installed</a>.</p>

<h3 id="define-the-project">Define the project<a href="#define-the-project" class="anchorLink">🔗</a></h3>

<ol>
  <li>
    <p>Create an empty project directory.</p>
    <p>You can name the directory something easy for you to remember.
This directory is the context for your application image. The
directory should only contain resources to build that image.</p>
    <p>This project directory contains a <code class="language-plaintext highlighter-rouge">docker-compose.yml</code> file which
is complete in itself for a good starter wordpress project.</p>
    <blockquote>
      <p><strong>Tip</strong>: You can use either a <code class="language-plaintext highlighter-rouge">.yml</code> or <code class="language-plaintext highlighter-rouge">.yaml</code> extension for
this file. They both work.</p>
    </blockquote>
  </li>
  <li>
    <p>Change into your project directory.</p>
    <p>For example, if you named your directory <code class="language-plaintext highlighter-rouge">my_wordpress</code>:</p>
    <div class="language-console highlighter-rouge"><div class="highlight"><pre class="highlight"><code><span class="gp">$</span><span class="w"> </span><span class="nb">cd </span>my_wordpress/
</code></pre></div>    </div>
  </li>
  <li>
    <p>Create a <code class="language-plaintext highlighter-rouge">docker-compose.yml</code> file that starts your
<code class="language-plaintext highlighter-rouge">WordPress</code> blog and a separate <code class="language-plaintext highlighter-rouge">MySQL</code> instance with volume
mounts for data persistence:</p>
    <div class="language-yaml highlighter-rouge"><div class="highlight"><pre class="highlight"><code><span class="na">services</span><span class="pi">:</span>
  <span class="na">db</span><span class="pi">:</span>
    <span class="c1"># We use a mariadb image which supports both amd64 &amp; arm64 architecture</span>
    <span class="na">image</span><span class="pi">:</span> <span class="s">mariadb:10.6.4-focal</span>
    <span class="c1"># If you really want to use MySQL, uncomment the following line</span>
    <span class="c1">#image: mysql:8.0.27</span>
    <span class="na">command</span><span class="pi">:</span> <span class="s1">'</span><span class="s">--default-authentication-plugin=mysql_native_password'</span>
    <span class="na">volumes</span><span class="pi">:</span>
      <span class="pi">-</span> <span class="s">db_data:/var/lib/mysql</span>
    <span class="na">restart</span><span class="pi">:</span> <span class="s">always</span>
    <span class="na">environment</span><span class="pi">:</span>
      <span class="pi">-</span> <span class="s">MYSQL_ROOT_PASSWORD=somewordpress</span>
      <span class="pi">-</span> <span class="s">MYSQL_DATABASE=wordpress</span>
      <span class="pi">-</span> <span class="s">MYSQL_USER=wordpress</span>
      <span class="pi">-</span> <span class="s">MYSQL_PASSWORD=wordpress</span>
    <span class="na">expose</span><span class="pi">:</span>
      <span class="pi">-</span> <span class="m">3306</span>
      <span class="pi">-</span> <span class="m">33060</span>
  <span class="na">wordpress</span><span class="pi">:</span>
    <span class="na">image</span><span class="pi">:</span> <span class="s">wordpress:latest</span>
    <span class="na">ports</span><span class="pi">:</span>
      <span class="pi">-</span> <span class="s">80:80</span>
    <span class="na">restart</span><span class="pi">:</span> <span class="s">always</span>
    <span class="na">environment</span><span class="pi">:</span>
      <span class="pi">-</span> <span class="s">WORDPRESS_DB_HOST=db</span>
      <span class="pi">-</span> <span class="s">WORDPRESS_DB_USER=wordpress</span>
      <span class="pi">-</span> <span class="s">WORDPRESS_DB_PASSWORD=wordpress</span>
      <span class="pi">-</span> <span class="s">WORDPRESS_DB_NAME=wordpress</span>
<span class="na">volumes</span><span class="pi">:</span>
  <span class="na">db_data</span><span class="pi">:</span>
</code></pre></div>    </div>
  </li>
</ol>
<blockquote class="note-vanilla">
  <p><strong>Notes</strong>:</p>
  <ul>
    <li>
      <p>The docker volumes <code class="language-plaintext highlighter-rouge">db_data</code> and <code class="language-plaintext highlighter-rouge">wordpress_data</code> persists updates made by WordPress
   to the database, as well as the installed themes and plugins. <a href="/storage/volumes/">Learn more about docker volumes</a></p>
    </li>
    <li>
      <p>WordPress Multisite works only on ports <code class="language-plaintext highlighter-rouge">80</code> and <code class="language-plaintext highlighter-rouge">443</code>.</p>
    </li>
  </ul>
</blockquote>
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
