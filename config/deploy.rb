# config valid only for current version of Capistrano
lock '3.7.0'

set :application, 'hhbdx'
set :repo_url, 'git@github.com:DennisdeBest/hhbdx.git'

# To make safe to deplyo to same server
set :tmp_dir, "/tmp/hhbdx"
set :symfony_console_path, "project/bin/console"
set :symfony_env, "dev"

# Default branch is :master
#ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp
set :branch, ENV['BRANCH'] || "develop"
# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, '/var/www/dev.hhbdx.fr'

# Symfony application path
set :app_path,"project/app"

# Symfony web path
set :web_path,"project/web"

fetch(:default_env).merge!(PATH: '$PATH:/opt/php-7.0.1/bin/php')
# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :airbrussh.
# set :format, :airbrussh

# You can configure the Airbrussh format using :format_options.
# These are the defaults.
# set :format_options, command_output: true, log_file: 'log/capistrano.log', color: :auto, truncate: :auto

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
set :linked_files, fetch(:linked_files, []).push('project/app/config/parameters.yml')
#set :linked_files, %w(app/config/parameters.yml project/app/config/parameters.yml)
# Default value for linked_dirs is []
set :linked_dirs, fetch(:linked_dirs, []).push('var')
# Dirs that need to be writable by the HTTP Server (i.e. cache, log dirs)
set :file_permissions_paths,['project/var/cache/dev/']

# Name used by the Web Server (i.e. www-data for Apache)
set :file_permissions_users, ['www-data']

# Name used by the Web Server (i.e. www-data for Apache)
set :webserver_user,        "www-data"
set :controllers_to_clear, [""]

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5
set :composer_install_flags, -> { "--no-interaction --optimize-autoloader --working-dir=#{fetch(:release_path)}/project" }
SSHKit.config.command_map[:composer] = "/opt/php-7.0.1/bin/php /usr/local/bin/composer"
SSHKit.config.command_map[:symfony] = "/opt/php-7.0.1/bin/php project/bin/console"
SSHKit.config.command_map[:php] = "/opt/php-7.0.1/bin/php"

after 'deploy:starting', 'composer:install_executable'
after 'deploy:updated', 'symfony:assets:install'
after 'deploy:updated', 'deploy:migrate'

namespace :deploy do

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end

# Run migrations after code is deployed (but not switched yet)
namespace :deploy do
  task :migrate do
    on roles(:db) do
      invoke 'symfony:console', 'doctrine:migrations:migrate  --no-interaction; true'
      #symfony_console 'doctrine:migrations:migrate', '--no-interaction'
    end
  end
end
