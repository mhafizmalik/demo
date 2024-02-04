# Use the official Ubuntu base image
FROM ubuntu

# Set the working directory inside the container
WORKDIR /app

# Copy the script into the container
COPY script.sh /app/script.sh

# Make the script executable
RUN chmod +x /app/script.sh

# Run the script as the default command
CMD ["/app/script.sh"]
