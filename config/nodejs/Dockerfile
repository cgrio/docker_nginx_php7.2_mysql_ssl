FROM node:14
WORKDIR /sandex-app
COPY package.json .
RUN npm install
COPY . .
CMD npm start