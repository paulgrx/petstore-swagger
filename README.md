### Requirements
Ubuntu with Docker installed.

### Run on local machine
1. Inside the `app` folder, create a `.env` file:
```
cp .env.example .env
```
2. Inside the `docker` folder, create the network, build the image, and run the project:
```
./create-network.sh
./build.sh
./up.local.sh
```

The project will be available at [http://localhost:8000/pet](http://localhost:8000/pet)