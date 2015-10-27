use Rack::Static,
    urls: %w(/style.css /vgasys.otf /robots.txt),
    root: 'public'

run lambda { |_env|
  [
    200,
    {
      'Content-Type'  => 'text/html',
      'Cache-Control' => 'public, max-age=86400'
    },
    File.open('public/index.html', File::RDONLY)
  ]
}
