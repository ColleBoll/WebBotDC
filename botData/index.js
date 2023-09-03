const { Client, GatewayIntentBits, PresenceUpdateStatus, ActivityType, InteractionType, Partials, REST, Routes } = require('discord.js');
const Discord = require('discord.js');
const client = new Client({
    intents: [
        GatewayIntentBits.DirectMessages,
        GatewayIntentBits.Guilds,
        GatewayIntentBits.GuildBans,
        GatewayIntentBits.GuildMessages,
        GatewayIntentBits.MessageContent,
        ],
    partials: [Partials.Channel],
});
const fs = require("node:fs");
const config = require('./config.json');

// var tokenData;
// var statusData;
// fetch('./config.json')
//     .then(response => response.json())
//     .then(data => {

//         tokenData = data[0].token;
//         statusData = data[0].status;
        
//         console.log("Token:", tokenData);
//         console.log("Status:", statusData);
//     })
//     .catch(error => {
//         console.error('Fout bij het ophalen van JSON: ', error);
//     });

client.commands = new Discord.Collection()
client.slashCommands = new Discord.Collection();

const slashCommands = [];

fs.readdir("./commands/", (err, files) => {
    var commandFiles = files.filter(f => f.split(".").pop() === "js");
    commandFiles.forEach((f, i) => {
        var fileGet = require(`./commands/${f}`);
        console.log(`De volgende file is geladen ${f}`);
        client.slashCommands.set(fileGet.data.name, fileGet);
        slashCommands.push(fileGet.data.toJSON());
    })
});

client.on("ready", async () => {

    console.log(`${client.user.username} is online`);

    client.user.setActivity(config[0].status, {type: ActivityType.Playing});

});

client.once("ready", () => {

    let clientId = "1053695218781782037";

    const rest = new REST({ version: '10' }).setToken(config[0].token);

    (async () => {
	try {
		console.log(`Started refreshing ${slashCommands.length} application (/) commands.`);

		await rest.put(
            Routes.applicationCommands(clientId),
            { body: slashCommands },
        );

		// console.log(`Successfully reloaded ${data.length} application (/) commands.`);
	} catch (error) {
		console.error(error);
	}
})();

});

client.on("interactionCreate", async interaction => {

    if (interaction.type === InteractionType.MessageComponent) {
    } else if (interaction.type === InteractionType.ApplicationCommand) {

        const slashCommand = client.slashCommands.get(interaction.commandName);
        if(!slashCommand) return;

        try {

            await slashCommand.execute(client, interaction);

        } catch (err) {
            console.log(err)
            await interaction.reply({ content: "Something went wrong!", ephemeral: true });
        }

    } else {
        return
    }
});

client.login(config[0].token);