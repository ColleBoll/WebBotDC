const { SlashCommandBuilder, ActionRowBuilder, ModalBuilder } = require('@discordjs/builders');
const { ButtonStyle, ChannelType, ComponentType, TextInputStyle } = require('discord.js');
const Discord = require('discord.js');

module.exports = {

    data: new SlashCommandBuilder()
        .setName('test')
        .setDescription('test iets'),

    async execute(client, interaction) {

        interaction.reply({ content: "test" });

    }
}