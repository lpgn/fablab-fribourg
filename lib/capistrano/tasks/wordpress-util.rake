namespace :wp do

  time = "#{Time.now.strftime '%Y-%m-%d_%H-%M-%S'}"

  # Copy shared files to current release
  desc 'Copy shared files to current release'
  task :shared do
    on roles(:web) do
      execute "rm -rf #{release_path}/src/uploads"
      execute "cp #{shared_path}/config/#{fetch(:configfile)} #{release_path}/config/#{fetch(:configfile)}"
      execute "ln -nsf #{shared_path}/uploads #{release_path}/src/uploads"
    end
  end

  # Sync media files
  desc 'Sync all media files'
  task :media do
    system "rsync -avz ./src/uploads #{fetch(:user)}@#{fetch(:host)}:#{shared_path}/"
  end

  # Push local DB to remote
  desc 'Push local DB to remote'
  task :push do
    set :confirmed, proc {
      puts <<-WARN

========================================================================
  WARNING: You're about to overwrite the remote database !
========================================================================

      WARN
      ask :answer, "Are you sure you want to continue? y/N"
      if fetch(:answer)== 'y' then
        system "mysqldump --no-create-db --add-drop-database -u #{fetch(:database)[fetch(:stage)][:local][:user]} #{fetch(:database)[fetch(:stage)][:local][:name]} > dump.#{fetch(:stage)}.#{time}.sql"
        system "scp dump.#{fetch(:stage)}.#{time}.sql #{fetch(:user)}@#{fetch(:host)}:#{fetch(:home)}/dump/#{fetch(:application)}/local/"
        on roles(:web) do
          execute "mysql -u #{fetch(:database)[fetch(:stage)][:remote][:user]} --password=#{fetch(:database)[fetch(:stage)][:remote][:password]} #{fetch(:database)[fetch(:stage)][:remote][:name]} < #{fetch(:home)}/dump/#{fetch(:application)}/local/dump.#{fetch(:stage)}.#{time}.sql"
        end
        system "rm dump.#{fetch(:stage)}.#{time}.sql"
      else
        puts "\nCancelled!"
        exit
      end
    }.call
  end

  # Pull remote DB to local
  desc 'Pull remote DB to local'
  task :pull do
    set :confirmed, proc {
      puts <<-WARN

========================================================================
  WARNING: You're about to overwrite the local database !
========================================================================

      WARN
      ask :answer, "Are you sure you want to continue? y/N"
      if fetch(:answer)== 'y' then
        on roles(:web) do
          execute "mysqldump --no-create-db --add-drop-database -u #{fetch(:database)[fetch(:stage)][:remote][:user]} --password=#{fetch(:database)[fetch(:stage)][:remote][:password]} #{fetch(:database)[fetch(:stage)][:remote][:name]} > #{fetch(:home)}/dump/#{fetch(:application)}/remote/dump.#{fetch(:stage)}.#{time}.sql"
        end
        system "scp #{fetch(:user)}@#{fetch(:host)}:#{fetch(:home)}/dump/#{fetch(:application)}/remote/dump.#{fetch(:stage)}.#{time}.sql ./"
        system "mysql -u #{fetch(:database)[fetch(:stage)][:local][:user]} #{fetch(:database)[fetch(:stage)][:local][:name]} < dump.#{fetch(:stage)}.#{time}.sql"
        system "rm dump.#{fetch(:stage)}.#{time}.sql"
      else
        puts "\nCancelled!"
        exit
      end
    }.call
  end

end