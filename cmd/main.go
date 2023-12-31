package main

import (
	"github.com/GenoF420/serviexpress/internal/config"
	"github.com/GenoF420/serviexpress/internal/server"
	"github.com/charmbracelet/log"
	"github.com/knadh/koanf/parsers/toml"
	"github.com/knadh/koanf/providers/file"
	"github.com/knadh/koanf/v2"
)

func main() {
	k := koanf.New(".")

	err := readConfigurations(k)

	if err != nil {
		log.Fatal("Failed reading configuration", "err", err)
	}

	srv, err := server.New(config.FromKoanf(k))
	if err != nil {
		log.Fatal("Failed creating Server", "err", err)
	}

	if err = srv.Run(); err != nil {
		log.Fatal("Failed running Server", "err", err)
	}
}

func readConfigurations(k *koanf.Koanf) error {
	if err := k.Load(file.Provider("config.toml"), toml.Parser()); err != nil {
		return err
	}
	return nil
}
