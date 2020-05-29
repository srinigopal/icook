<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.json") }}">View Postman Collection</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: May 29 2020</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>Welcome to our API documentation!</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile), and you can switch the programming language of the examples with the tabs in the top right (or from the nav menu at the top left on mobile).</aside><h1>Authenticating requests</h1>
<p>This API is not authenticated.</p><h1>Endpoints</h1>
<h2>docs.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/docs.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/docs.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "scribe\/collection.json",
    "exception": "Illuminate\\Contracts\\Filesystem\\FileNotFoundException",
    "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\FilesystemAdapter.php",
    "line": 135,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Http\\Controller.php",
            "line": 22,
            "function": "get",
            "class": "Illuminate\\Filesystem\\FilesystemAdapter",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 48,
            "function": "json",
            "class": "Knuckles\\Scribe\\Http\\Controller",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 239,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 196,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 685,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 687,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 662,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 628,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 617,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 165,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 63,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 140,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 109,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 322,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 304,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 203,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 141,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 101,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 118,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 33,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 36,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 91,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 35,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 592,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 134,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\symfony\\console\\Application.php",
            "line": 912,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\symfony\\console\\Application.php",
            "line": 264,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\symfony\\console\\Application.php",
            "line": 140,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\xampp\\htdocs\\icook\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "-&gt;"
        }
    ]
}</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>docs.json</code></strong></p>
<h2>Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/sanctum/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>sanctum/csrf-cookie</code></strong></p>
<h2>Handle the incoming request.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/config" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/config"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>api/config</code></strong></p>
<h2>api/user</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>api/user</code></strong></p>
<h2>api/auth/signup</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"firstName":"et","lastName":"non","email":"jacobson.elnora@example.org","password":"quia","confirmPassword":"aut"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "firstName": "et",
    "lastName": "non",
    "email": "jacobson.elnora@example.org",
    "password": "quia",
    "confirmPassword": "aut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>api/auth/signup</code></strong></p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p><code><b>firstName</b></code>&nbsp; <small>string</small>     <br></p>
<p><code><b>lastName</b></code>&nbsp; <small>string</small>     <br></p>
<p><code><b>email</b></code>&nbsp; <small>string</small>     <br>
The value must be a valid email address.</p>
<p><code><b>password</b></code>&nbsp; <small>string</small>     <br></p>
<p><code><b>confirmPassword</b></code>&nbsp; <small>string</small>     <br></p>
<h2>api/auth/login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"trantow.amparo@example.com","password":"eos"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "trantow.amparo@example.com",
    "password": "eos"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>api/auth/login</code></strong></p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p><code><b>email</b></code>&nbsp; <small>string</small>     <br>
The value must be a valid email address.</p>
<p><code><b>password</b></code>&nbsp; <small>string</small>     <br></p>
<h2>api/auth/login-lookup</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/login-lookup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"tierra.osinski@example.org"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/login-lookup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "tierra.osinski@example.org"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>api/auth/login-lookup</code></strong></p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p><code><b>email</b></code>&nbsp; <small>string</small>     <br>
The value must be a valid email address.</p>
<h2>api/login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>api/login</code></strong></p>
<h2>api/logout</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>api/logout</code></strong></p>
<h2>Show the public (unauthenticated) index page.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8" /&gt;
        &lt;meta http-equiv="refresh" content="0;url='http://localhost/login'" /&gt;

        &lt;title&gt;Redirecting to http://localhost/login&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        Redirecting to &lt;a href="http://localhost/login"&gt;http://localhost/login&lt;/a&gt;.
    &lt;/body&gt;
&lt;/html&gt;</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>/</code></strong></p>
<h2>login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;

        &lt;title&gt;GoICook&lt;/title&gt;

        &lt;meta charset="utf-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
        &lt;meta name="cur-rte" content="login"&gt;
        &lt;meta name="csrf-token" content="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;

        &lt;script src="/js/app.js?id=73cfacbce3ba009f35f6" defer&gt;&lt;/script&gt; 

    &lt;script src="/js/login/index.js?id=9d4b47841b2142a77179" defer&gt;&lt;/script&gt;

        &lt;link href="/css/app.css?id=7cab58508017b184d0f2" rel="stylesheet"&gt; 

    &lt;/head&gt;
    &lt;body&gt;

        &lt;nav class="fixed-top"&gt;
            &lt;div id="top-menu"&gt;
                &lt;top-menu&gt;&lt;/top-menu&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main&gt;

    &lt;section class="flex-fill d-flex align-items-center justify-content-center bg-light-grey min-vh-100"&gt;

        &lt;div class="card w-75 w-xl-50"&gt;

            &lt;div class="card-body" id="root-login-form"&gt;
                &lt;login-form&gt;&lt;/login-form&gt;
            &lt;/div&gt;

        &lt;/div&gt;

    &lt;/section&gt;

        &lt;/main&gt;

    &lt;/body&gt;

&lt;/html&gt;</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>login</code></strong></p>
<h2>logout</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>logout</code></strong></p>
<h2>Show the application registration form.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name="csrf-token" content="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src="http://localhost/js/web.js" defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;

    &lt;!-- Styles --&gt;
    &lt;link href="http://localhost/css/web.css" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id="app"&gt;
        &lt;nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"&gt;
            &lt;div class="container"&gt;
                &lt;a class="navbar-brand" href="http://localhost"&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"&gt;
                    &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class="collapse navbar-collapse" id="navbarSupportedContent"&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class="navbar-nav mr-auto"&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class="navbar-nav ml-auto"&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class="nav-item"&gt;
                                &lt;a class="nav-link" href="http://localhost/login"&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class="nav-item"&gt;
                                    &lt;a class="nav-link" href="http://localhost/register"&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class="py-4"&gt;
            &lt;div class="container"&gt;
    &lt;div class="row justify-content-center"&gt;
        &lt;div class="col-md-8"&gt;
            &lt;div class="card"&gt;
                &lt;div class="card-header"&gt;Register&lt;/div&gt;

                &lt;div class="card-body"&gt;
                    &lt;form method="POST" action="http://localhost/register"&gt;
                        &lt;input type="hidden" name="_token" value="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;
                        &lt;div class="form-group row"&gt;
                            &lt;label for="name" class="col-md-4 col-form-label text-md-right"&gt;Name&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row"&gt;
                            &lt;label for="email" class="col-md-4 col-form-label text-md-right"&gt;E-Mail Address&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email"&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row"&gt;
                            &lt;label for="password" class="col-md-4 col-form-label text-md-right"&gt;Password&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="password" type="password" class="form-control " name="password" required autocomplete="new-password"&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row"&gt;
                            &lt;label for="password-confirm" class="col-md-4 col-form-label text-md-right"&gt;Confirm Password&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row mb-0"&gt;
                            &lt;div class="col-md-6 offset-md-4"&gt;
                                &lt;button type="submit" class="btn btn-primary"&gt;
                                    Register
                                &lt;/button&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>register</code></strong></p>
<h2>Handle a registration request for the application.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>register</code></strong></p>
<h2>Display the form to request a password reset link.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name="csrf-token" content="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src="http://localhost/js/web.js" defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;

    &lt;!-- Styles --&gt;
    &lt;link href="http://localhost/css/web.css" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id="app"&gt;
        &lt;nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"&gt;
            &lt;div class="container"&gt;
                &lt;a class="navbar-brand" href="http://localhost"&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"&gt;
                    &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class="collapse navbar-collapse" id="navbarSupportedContent"&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class="navbar-nav mr-auto"&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class="navbar-nav ml-auto"&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class="nav-item"&gt;
                                &lt;a class="nav-link" href="http://localhost/login"&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class="nav-item"&gt;
                                    &lt;a class="nav-link" href="http://localhost/register"&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class="py-4"&gt;
            &lt;div class="container"&gt;
    &lt;div class="row justify-content-center"&gt;
        &lt;div class="col-md-8"&gt;
            &lt;div class="card"&gt;
                &lt;div class="card-header"&gt;Reset Password&lt;/div&gt;

                &lt;div class="card-body"&gt;

                    &lt;form method="POST" action="http://localhost/password/email"&gt;
                        &lt;input type="hidden" name="_token" value="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;
                        &lt;div class="form-group row"&gt;
                            &lt;label for="email" class="col-md-4 col-form-label text-md-right"&gt;E-Mail Address&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row mb-0"&gt;
                            &lt;div class="col-md-6 offset-md-4"&gt;
                                &lt;button type="submit" class="btn btn-primary"&gt;
                                    Send Password Reset Link
                                &lt;/button&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>password/reset</code></strong></p>
<h2>Send a reset link to the given user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>password/email</code></strong></p>
<h2>Display the password reset view for the given token.</h2>
<p>If no token is present, display the link request form.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;

    &lt;!-- CSRF Token --&gt;
    &lt;meta name="csrf-token" content="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Scripts --&gt;
    &lt;script src="http://localhost/js/web.js" defer&gt;&lt;/script&gt;

    &lt;!-- Fonts --&gt;

    &lt;!-- Styles --&gt;
    &lt;link href="http://localhost/css/web.css" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id="app"&gt;
        &lt;nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"&gt;
            &lt;div class="container"&gt;
                &lt;a class="navbar-brand" href="http://localhost"&gt;
                    Laravel
                &lt;/a&gt;
                &lt;button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"&gt;
                    &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
                &lt;/button&gt;

                &lt;div class="collapse navbar-collapse" id="navbarSupportedContent"&gt;
                    &lt;!-- Left Side Of Navbar --&gt;
                    &lt;ul class="navbar-nav mr-auto"&gt;

                    &lt;/ul&gt;

                    &lt;!-- Right Side Of Navbar --&gt;
                    &lt;ul class="navbar-nav ml-auto"&gt;
                        &lt;!-- Authentication Links --&gt;
                                                    &lt;li class="nav-item"&gt;
                                &lt;a class="nav-link" href="http://localhost/login"&gt;Login&lt;/a&gt;
                            &lt;/li&gt;
                                                            &lt;li class="nav-item"&gt;
                                    &lt;a class="nav-link" href="http://localhost/register"&gt;Register&lt;/a&gt;
                                &lt;/li&gt;
                                                                        &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main class="py-4"&gt;
            &lt;div class="container"&gt;
    &lt;div class="row justify-content-center"&gt;
        &lt;div class="col-md-8"&gt;
            &lt;div class="card"&gt;
                &lt;div class="card-header"&gt;Reset Password&lt;/div&gt;

                &lt;div class="card-body"&gt;
                    &lt;form method="POST" action="http://localhost/password/reset"&gt;
                        &lt;input type="hidden" name="_token" value="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;
                        &lt;input type="hidden" name="token" value="1"&gt;

                        &lt;div class="form-group row"&gt;
                            &lt;label for="email" class="col-md-4 col-form-label text-md-right"&gt;E-Mail Address&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row"&gt;
                            &lt;label for="password" class="col-md-4 col-form-label text-md-right"&gt;Password&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="password" type="password" class="form-control " name="password" required autocomplete="new-password"&gt;

                                                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row"&gt;
                            &lt;label for="password-confirm" class="col-md-4 col-form-label text-md-right"&gt;Confirm Password&lt;/label&gt;

                            &lt;div class="col-md-6"&gt;
                                &lt;input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;

                        &lt;div class="form-group row mb-0"&gt;
                            &lt;div class="col-md-6 offset-md-4"&gt;
                                &lt;button type="submit" class="btn btn-primary"&gt;
                                    Reset Password
                                &lt;/button&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/form&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
        &lt;/main&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>password/reset/{token}</code></strong></p>
<h2>Reset the given user&#039;s password.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>password/reset</code></strong></p>
<h2>Display the password confirmation view.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>password/confirm</code></strong></p>
<h2>Confirm the given user&#039;s password.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>Request</h3>
<p><small class="badge badge-black">POST</small>
<strong><code>password/confirm</code></strong></p>
<h2>Show the application dashboard.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/dashboard" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/dashboard"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>dashboard</code></strong></p>
<h2>signup</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;

        &lt;title&gt;GoICook&lt;/title&gt;

        &lt;meta charset="utf-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
        &lt;meta name="cur-rte" content="public-signup"&gt;
        &lt;meta name="csrf-token" content="gkcKafZrggLn5xsNcslHtOWiZl2Furgdg8C0zG0K"&gt;

        &lt;script src="/js/app.js?id=73cfacbce3ba009f35f6" defer&gt;&lt;/script&gt; 

    &lt;script src="/js/signup/index.js?id=3def66371757824bfdbf" defer&gt;&lt;/script&gt;

        &lt;link href="/css/app.css?id=7cab58508017b184d0f2" rel="stylesheet"&gt; 

    &lt;/head&gt;
    &lt;body&gt;

        &lt;nav class="fixed-top"&gt;
            &lt;div id="top-menu"&gt;
                &lt;top-menu&gt;&lt;/top-menu&gt;
            &lt;/div&gt;
        &lt;/nav&gt;

        &lt;main&gt;

    &lt;section class="container-fluid d-flex h-100"&gt;

        &lt;div class="row flex-fill"&gt;

            &lt;div class="col-12 col-md-3 d-flex align-items-center justify-content-center bg-primary text-white"&gt;

                &lt;div class="text-center text-white"&gt;
                    &lt;h3 class="display-5 py-3"&gt;Sign Up&lt;/h3&gt;
                    &lt;h5 class="font-weight-light px-2"&gt;
                        &lt;p&gt;Not using Eearning yet?&lt;/p&gt;
                        &lt;p&gt;That's OK, our easy signup process will have you up and running in no time.&lt;/p&gt;
                    &lt;/h5&gt;
                    &lt;h2 class="font-weight-light pt-3"&gt;Let's Go.&lt;/h2&gt;
                &lt;/div&gt;

            &lt;/div&gt;

            &lt;div id="root-signup" class="col-12 col-md-9 p-md-5 bg-white"&gt;
                &lt;sign-up-form&gt;&lt;/sign-up-form&gt;
            &lt;/div&gt;

        &lt;/div&gt;

    &lt;/section&gt;

        &lt;/main&gt;

    &lt;/body&gt;

&lt;/html&gt;</code></pre>
<h3>Request</h3>
<p><small class="badge badge-green">GET</small>
<strong><code>signup</code></strong></p>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript"];
        setupLanguages(languages);
    });
</script>
</body>
</html>