# config valid only for Capistrano 3.1
lock '3.2.1'

set :user, 'cardis-minisites'
set :host, 'antistatique.alwaysdata.net'
set :home, '/home/cardis-minisites'
set :configfile, 'application.php'

role :app, %w{cardis-minisites@antistatique.alwaysdata.net}
role :web, %w{cardis-minisites@antistatique.alwaysdata.net}
role :db,  %w{cardis-minisites@antistatique.alwaysdata.net}

server 'antistatique.alwaysdata.net'
set :tmp_dir, "/home/cardis-minisites/tmp"

set :repo_url, 'git@bitbucket.org:antistatique/cardis-minisites-wp.git'

set :deploy_via, :remote_cache
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules"]
set :scm, :git
set :use_sudo, false
set :log_level, :info

# set :linked_files, %w{config/database.yml}
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

set :keep_releases, 5

namespace :deploy do

  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :touch, release_path.join('tmp/restart.txt')
    end
  end

  after :publishing, :restart

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

  after :finishing, 'deploy:cleanup'

end

after "deploy", "wp:shared"

before "wp:init", "deploy:starting"
after "wp:init", "deploy:started"
after "wp:init", "deploy:updating"
after "wp:init", "deploy:updated"
after "wp:init", "deploy:publishing"
after "wp:init", "deploy:published"
after "wp:init", "deploy:finishing"
after "wp:init", "deploy:finished"
after "wp:init", "wp:config"

after "wp:config", "wp:shared"
