personal wordpress scaffold, based on timber/starter-theme + carbon fields & tailwind, alpinejs using laravel mix

```
composer install
npm install
npx mix / npx mix watch / npm run prod (or npx mix --production) / npm run pack
wp-env start (if wp-env installed)
```

```npm run pack``` builds & copies files to /pack, excluding node_modules, source css&js, configs, etc.; needs bash to run

useful:
- [installing composer](https://getcomposer.org/download/)
- [timber/starter-theme repository](https://github.com/timber/starter-theme/tree/2.x)
- [timber documentation](https://timber.github.io/docs/v2/)
- [tailwind classes](https://nerdcave.com/tailwind-cheat-sheet)
- [tailwind docs](https://tailwindcss.com/docs)
- [alpinejs docs](https://alpinejs.dev/start-here)
- [carbon fields docs](https://docs.carbonfields.net/)
- [wp theme functions](https://developer.wordpress.org/themes/basics/theme-functions/)

tested on [WSL2](https://learn.microsoft.com/en-us/windows/wsl/install)
