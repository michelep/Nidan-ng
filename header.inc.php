<?php
//
// Nidan-ng
// LAN monitoring system
//
// by Michele "O-Zone" Pinassi
//
// This file is part of Nidan-ng
//
// Nidan-ng is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or any later version.
//
// Nidan-ng is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License along with Nidan-ng. If not, see <http://www.gnu.org/licenses/>.
//

include __DIR__."/common.inc.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nidan-ng - LAN monitoring system">
    <meta name="author" content="Michele <o-zone@zerozone.it> Pinassi">
    <title>Nidan-ng - LAN monitoring system</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/common.css" rel="stylesheet">
</head><body class="d-flex flex-column h-100">
    <header>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><img src="nidan-ng_48x48.png" title="Nidan-ng">&nbsp;Nidan-ng</a>
	    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		    <li class="nav-item active">
			<a class="nav-link" href="/">Home</span></a>
		    </li>
		    <li class="nav-item">
			<a class="nav-link" href="/report">Report</a>
		    </li>
		    <li class="nav-item">
			<a class="nav-link" href="/config">Configuration</a>
		    </li>
		</ul>
	    </div>
	    <form class="form-inline">
		<div class="input-group">
		    <input type="text" class="form-control form-control-sm mr-sm-2" placeholder="Username" aria-label="Username">
		    <input type="text" class="form-control form-control-sm mr-sm-2" placeholder="Password" aria-label="Password">
		    <button class="btn btn-primary my-2 my-sm-0" type="submit">Login</button>
		</div>
	    </form>
	</nav>
    </header>
<!-- Begin page content -->
    <main class="flex-shrink-0">
	<div class="container">


