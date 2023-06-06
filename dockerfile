FROM nginx:alpine

WORKDIR /app

COPY . .

COPY . /usr/share/nginx/html