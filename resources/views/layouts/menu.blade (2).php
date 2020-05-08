<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Utlisateurs</span></a>
</li><li class="{{ Request::is('plantes*') ? 'active' : '' }}">
    <a href="{{ route('plantes.index') }}"><i class="fa fa-edit"></i><span>Plantes</span></a>
</li>

<li class="{{ Request::is('regionPratiquees*') ? 'active' : '' }}">
    <a href="{{ route('regionPratiquees.index') }}"><i class="fa fa-edit"></i><span>Region Pratiquees</span></a>
</li>

<li class="{{ Request::is('zoneRencontrees*') ? 'active' : '' }}">
    <a href="{{ route('zoneRencontrees.index') }}"><i class="fa fa-edit"></i><span>Zone Rencontrees</span></a>
</li>

<li class="{{ Request::is('vertues*') ? 'active' : '' }}">
    <a href="{{ route('vertues.index') }}"><i class="fa fa-edit"></i><span>Vertues</span></a>
</li>

<li class="{{ Request::is('partieUtilisees*') ? 'active' : '' }}">
    <a href="{{ route('partieUtilisees.index') }}"><i class="fa fa-edit"></i><span>Partie Utilisees</span></a>
</li>

