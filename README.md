<a href="https://github.com/twobitint/flicker/actions"><img src="https://github.com/twobitint/flicker/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://poser.pugx.org/laravel/laravel/license.svg" alt="License"></a>

## About Flicker

Decide what to watch.

### Install

Flicker is a laraval app and as such you can follow the usual laravel installation guide to get started. Alternatively, you may run a development build with docker.

#### To get started

```
cp .env.example .env
docker-compose up -d --build web db phpmyadmin
docker-compose build workspace
docker-compose run --rm workspace ./install.sh
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
