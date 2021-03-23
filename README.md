<h1>Installation</h1>
<p>1. Rename or copy .env-example file to .env </p>
<p>2. Set your Stripe credentials in your .env file. Specifically STRIPE_KEY and STRIPE_SECRET  <a href= "https://stripe.com/">Stripe</a></p>
<p>3. Set your Mailtrap credentials in your .env file. Specifically MAIL_USERNAME and MAIL_PASSWORD <a href = "https://mailtrap.io/">Mailtrap</a></p>
<p>4. If you use MySQL in .env file : set DB_CONNECTION, set DB_DATABASE, set DB_USERNAME, set DB_PASSWORD,
<p>5. composer update </p>
<p>6. Generating a New Application Key</p><p>php artisan key:generate</p>
<p>7. php artisan migrate</p>
<p>8. php artisan serve </p>
<p>9. Visit localhost:8000 in your browser </p>



