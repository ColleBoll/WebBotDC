const { SlashCommandBuilder, ActionRowBuilder, ModalBuilder } = require('@discordjs/builders');
const { ButtonStyle, ChannelType, ComponentType, TextInputStyle } = require('discord.js');
const Discord = require('discord.js');

const config = require('./test.json');

module.exports = {

    data: new SlashCommandBuilder()
        .setName(config[0].name)
        .setDescription(config[0].description),

    async execute(client, interaction) {

        interaction.reply({ content: config[0].message });

    }
}