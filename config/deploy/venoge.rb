# Stage name
set :stage, :venoge

# Application name
set :application, 'www.lesjardins-venoge.ch'

# Site full url
set :siteurl, 'http://lesjardins-venoge.ch'

# Deploy directory
set :deploy_to, "/home/cardis-minisites/www/#{fetch(:application)}"

set :branch, :master