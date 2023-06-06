FROM nginx:alpine

WORKDIR /app/static

COPY . .

COPY . /usr/share/nginx/html