# Use the official Nginx image as the base
FROM nginx:latest

# Copy the static HTML files to the appropriate location
COPY ./cards_test /usr/share/nginx/html

COPY ./* /usr/share/nginx/html

# Expose port 80 for HTTP traffic
EXPOSE 80
