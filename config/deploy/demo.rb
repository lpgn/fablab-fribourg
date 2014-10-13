# Stage name
set :stage, :demo

# Application name
set :application, 'cardis-minisites.alwaysdata.net'

# Site full url
set :siteurl, 'http://cardis-minisites.alwaysdata.net'

# Deploy directory
set :deploy_to, "/home/cardis-minisites/www/#{fetch(:application)}"

set :branch, :dev