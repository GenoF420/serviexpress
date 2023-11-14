package config

type Config struct {
	HTTP     HTTP     `koanf:"http"`
	Database Database `koanf:"database"`
	JWT      JWT      `koanf:"jwt"`
}

type HTTP struct {
	Address string `koanf:"address"`
	Port    int    `koanf:"port"`
	Debug   bool   `koanf:"debug"`
}

type Database struct {
	Host     string `koanf:"host"`
	Port     int    `koanf:"port"`
	Database string `koanf:"database"`
	Username string `koanf:"username"`
	Password string `koanf:"password"`
	SSLMode  string `koanf:"ssl-mode"`
}

type JWT struct {
	PrivateKey string `koanf:"private-key"`
	PublicKey  string `koanf:"public-key"`
}

func Default() *Config {
	return &Config{
		HTTP: HTTP{
			Address: "127.0.0.1",
			Port:    80,
			Debug:   false,
		},
	}
}

func Apply(cfg *Config, opts ...Option) *Config {
	for _, op := range opts {
		cfg = op(cfg)
	}

	return cfg
}

func Build(opts ...Option) *Config {
	return Apply(Default(), opts...)
}
